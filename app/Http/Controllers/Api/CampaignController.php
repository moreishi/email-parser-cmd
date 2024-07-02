<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CampaignRepository;
use App\Services\CampaignService;
use App\Http\Requests\CampaignCreateRequest;
use App\Http\Requests\CampaignUpdateRequest;
use App\Dto\CampaignDto;


class CampaignController extends Controller
{

    public $campaignRepository;
    public $campaignService;

    public function __construct(
        CampaignService $campaignService,
        CampaignRepository $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
        $this->campaignService = $campaignService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->campaignRepository->getall();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignCreateRequest $request)
    {
        $dto = new CampaignDto();
        $dto->email = $request->email;
        $dto->raw_text = $request->raw_text;
        $dto->affiliate_id = $request->affiliate_id;
        $dto->envelope = $request->envelope;
        $dto->from = $request->from;
        $dto->to = $request->to;
        $dto->subject = $request->subject;
        return $this->campaignService->create($dto);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->campaignRepository->getById($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CampaignUpdateRequest $request, string $id)
    {
        $dto = new CampaignDto();
        $dto->raw_text = $request->raw_text;
        return $this->campaignService->update($dto, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->campaignService->delete($id);
    }
}
