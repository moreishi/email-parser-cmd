<?php

namespace App\Interfaces;

use App\Http\Resources\AuthResource;
use App\Dto\AuthDto;

interface IAuthService {

    public function login(AuthDto $authDto) : AuthResource;

}