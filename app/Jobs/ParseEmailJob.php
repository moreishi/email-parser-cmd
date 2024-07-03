<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\Campaign;
use App\Services\HtmlParserService;

class ParseEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Campaign $campaign;

    /**
     * Create a new job instance.
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
        $this->handle();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $body = HtmlParserService::parseContentType(
            strip_tags($this->campaign->email),
            'Content-Type: text/plain;', // Start parse
            'Content-Type: text/html;'); // End Parse
        
        $content = HtmlParserService::removeStringBefore(
            $body, 
            HtmlParserService::removeStringBefore($body, "From: ")); // Remove all text before pattern
        
        foreach([
            'quoted-printable',
            'charset=utf-8',
            'Content-Transfer-Encoding: QUOTED-PRINTABLE'
        ] as $pattern) {
            $content = HtmlParserService::removeContentPattern($content, $pattern);
        }
        
        $this->campaign->raw_text = $content;
        $this->campaign->save();

    }

    
}
