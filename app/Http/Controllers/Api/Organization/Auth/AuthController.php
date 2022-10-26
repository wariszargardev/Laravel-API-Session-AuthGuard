<?php

namespace App\Http\Controllers\Api\Organization\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Organization\LoginRequest;
use App\Http\Requests\Api\Organization\RegisterRequest;
use App\Services\OrganizationServices;

class AuthController extends ApiController
{
    private $OrganizationServices;

    public function __construct(OrganizationServices $OrganizationServices)
    {
        $this->OrganizationServices = $OrganizationServices;
    }

    public function login(LoginRequest $request)
    {
        return $this->OrganizationServices->login($request->all());
    }

    public function register(RegisterRequest $request)
    {
        return $this->OrganizationServices->register($request->all());
    }
}
