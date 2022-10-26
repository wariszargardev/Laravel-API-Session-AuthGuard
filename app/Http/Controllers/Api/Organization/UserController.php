<?php

namespace App\Http\Controllers\Api\Organization;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Services\OrganizationServices;
use App\Services\UserServices;

class UserController extends ApiController
{
    private $organizationServices;

    public function __construct(OrganizationServices $organizationServices)
    {
        $this->organizationServices= $organizationServices;
    }

    public function profile(){
        $user= $this->organizationServices->profile();
        return $this->successResponse($user, 'User profile');
    }
}
