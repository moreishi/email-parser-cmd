<?php

namespace App\Interfaces;
use App\Http\Resources\CampaignResource;
use App\Dto\CampaignDto;
use Symfony\Component\HttpFoundation\JsonResponse;

interface ICampaignService {

    public function create(CampaignDto $campaignDto) : CampaignResource;

    public function update(CampaignDto $campaignDto, int $id) : CampaignResource;

    public function delete(int $campaignId) : JsonResponse;

}