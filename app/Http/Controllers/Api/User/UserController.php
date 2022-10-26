<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Services\UserServices;

class UserController extends ApiController
{
    private $userService;

    public function __construct(UserServices $userServices)
    {
        $this->userService= $userServices;
    }

    public function profile(){
        $user= $this->userService->profile();
        return $this->successResponse($user, 'User profile');
    }
}
