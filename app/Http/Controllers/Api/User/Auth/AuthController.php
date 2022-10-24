<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Services\UserServices;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function login(LoginRequest $request)
    {
        return $this->userServices->login($request->all());
    }
}
