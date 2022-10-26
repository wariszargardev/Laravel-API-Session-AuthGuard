<?php

namespace App\Repositories;

use App\Http\Resources\Organization\OrganizationResource;
use App\Models\Organization;
use Auth;

class OrganizationRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Organization $model)
    {
        $this->model = $model;
    }

    public function login($data){
        if(Auth::guard('organization')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return true;
        }
        return false;
    }

    public function register($data){
        $this->model->name = $data['name'];
        $this->model->email = $data['email'];
        $this->model->cnic = $data['cnic'];
        $this->model->phone_number = $data['phone_number'];
        $this->model->password = \Hash::make($data['password']);
        $this->model->save();

        if(Auth::guard('organization')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return true;
        }
        return false;
    }

    public function getResponseAfterLogin(){
        $data = array();
        $user = Auth::guard('organization')->user();
        $data['token']=  $user->createToken(env('APP_NAME'))->accessToken;
        $data['user'] = new OrganizationResource($user);
        return $data;
    }

    public function profile(){
        $user = Auth::guard('organization-api')->user();
        return new OrganizationResource($user);
    }
}
