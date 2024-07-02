<?php

namespace App\Services;

use App\Interfaces\ICampaignService;
use App\Dto\CampaignDto;
use App\Http\Resources\CampaignResource;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\Campaign;
use Carbon\Carbon;

class CampaignService implements ICampaignService {

    public function create(CampaignDto $dto) : CampaignResource {
        $campaign = Campaign::create([
            'email' => $dto->email,
            'raw_text' => $dto->raw_text,
            'envelope' => $dto->envelope,
            'affiliate_id' => $dto->affiliate_id,
            'from' => $dto->from,
            'subject' => $dto->subject,
            'to' => $dto->to,
            'email' => $dto->email,
            'timestamp' => Carbon::now()->timestamp,
        ]);
        return new CampaignResource($campaign);
    }

    public function update(CampaignDto $dto, int $id) : CampaignResource {
        $campaign = Campaign::find($id);
        $campaign->raw_text = $dto->raw_text;
        $campaign->save();
        return new CampaignResource($campaign);
    }

    public function delete(int $id) : JsonResponse {

        $campaign = Campaign::findOrFail($id);
        
        if($campaign) {
            $campaign->delete();
            return new JsonResponse(['message' => 'Deleted'], 201);
        }

        return new JsonResponse(['message' => 'Bad request'], 400);
    }

}