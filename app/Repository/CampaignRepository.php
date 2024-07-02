<?php

namespace App\Repository;
use App\Interfaces\ICampaignRepository;
use App\Http\Resources\CampaignResource;
use App\Models\Campaign;

class CampaignRepository implements ICampaignRepository {

    public function getAll() : CampaignResource {
        return new CampaignResource(Campaign::get());
    }

    public function getById(int $campaignId) : CampaignResource {
        return new CampaignResource(Campaign::findOrFail($campaignId));
    }

}