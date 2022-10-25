<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Auth;

class UserServices extends AbstractService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository= $userRepository;
    }

    public function login($formInput){

        if ($this->userRepository->login($formInput)) {
            return $this->successResponse($this->userRepository->getResponseAfterLogin(), 'User login successfully');
        }

        return $this->errorMessage('Unauthorized', 401);
    }

    public function register($formInput){
        $this->userRepository->register($formInput);
        return $this->successResponse($this->userRepository->getResponseAfterLogin(), 'User login successfully');
    }

    public function profile(){
        return $this->userRepository->profile();
    }
}
