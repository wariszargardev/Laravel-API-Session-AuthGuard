<?php

namespace App\Repositories;

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

}
