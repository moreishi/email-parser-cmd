<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ParseEmailJob;
use App\Models\Campaign;
use Illuminate\Support\Facades\Log;

class ParseEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will parse email, it will remove html tags';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        foreach(Campaign::all() as $item) {
            ParseEmailJob::dispatch(Campaign::find($item->id));
        }

    }
}
