<?php

namespace App\Services;
use App\Models\User;
use App\Http\Resources\AuthResource;
use App\Dto\AuthDto;
use App\Interfaces\IAuthService;
use Illuminate\Support\Facades\Auth;

class AuthService implements IAuthService {

    public function login(AuthDto $authDto) : AuthResource {

        if(Auth::attempt(['email' => $authDto->email, 'password' => $authDto->password])) {
            
            $token = request()->user()->createToken('auth_token')->plainTextToken;

            return new AuthResource([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'token' => $token
            ]);
        }

        return new AuthResource([
            'message' => 'Unable to authenticate credentials!'
        ]);

        
    }

}