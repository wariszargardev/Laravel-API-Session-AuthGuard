<?php

namespace App\Repositories;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Auth;

class UserRepository extends AbstractRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login($data){
        if(Auth::guard('user')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return true;
        }
        return false;
    }

    public function getResponseAfterLogin(){
        $data = array();
        $user = Auth::guard('user')->user();
        $data['token']=  $user->createToken(env('APP_NAME'))->accessToken;
        $data['user'] = new UserResource($user);
        return $data;
    }
}
