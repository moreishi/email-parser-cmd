<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\AuthController;

Route::prefix('v1')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function() {
        Route::get('campaigns', [CampaignController::class, 'index']);
        Route::get('campaigns/{id}', [CampaignController::class, 'show']);
        Route::post('campaigns', [CampaignController::class, 'store']);
        Route::put('campaigns/{id}', [CampaignController::class, 'update']);
        Route::delete('campaigns/{id}', [CampaignController::class, 'destroy']);
    });
});
