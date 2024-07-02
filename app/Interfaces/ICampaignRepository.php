<?php

namespace App\Interfaces;
use App\Http\Resources\CampaignResource;

interface ICampaignRepository {

    public function getAll() : CampaignResource;

    public function getById(int $campaignId) : CampaignResource;

}