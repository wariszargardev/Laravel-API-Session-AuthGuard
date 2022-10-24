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

    public function login($data){

        if ($this->userRepository->login($data)) {
            $user = Auth::guard('user')->user();
            $data['token']=  $user->createToken('Token Name')->accessToken;
            $data['user'] = $user;
            return $this->successResponse($data, 'User login successfully');
        }

        return $this->errorMessage('Unauthorized', 401);
    }
}
