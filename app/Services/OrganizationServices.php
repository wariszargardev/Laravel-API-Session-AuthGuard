<?php

namespace App\Services;

use App\Repositories\OrganizationRepository;
use Auth;

class OrganizationServices extends AbstractService
{
    private $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository= $organizationRepository;
    }

    public function login($formInput){

        if ($this->organizationRepository->login($formInput)) {
            return $this->successResponse($this->organizationRepository->getResponseAfterLogin(), 'Organization login successfully');
        }

        return $this->errorMessage('Invalid credentials', 401);
    }

    public function register($formInput){
        $this->organizationRepository->register($formInput);
        return $this->successResponse($this->organizationRepository->getResponseAfterLogin(), 'Organization register successfully');
    }

    public function profile(){
        return $this->organizationRepository->profile();
    }
}
