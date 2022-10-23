<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{
    public function index()
    {
        return view('organization.index');
    }
}
