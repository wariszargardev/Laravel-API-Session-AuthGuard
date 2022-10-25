<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\User\LoginRequest;
use App\Http\Requests\Api\User\RegisterRequest;
use App\Services\UserServices;

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

    public function register(RegisterRequest $request)
    {
        return $this->userServices->register($request->all());
    }
}
