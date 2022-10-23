<?php

namespace App\Http\Controllers\Organization\Auth;

use App\Constants\AuthRedirectionConstants;
use App\Http\Controllers\Controller;
use App\Http\Traits\Organization\AuthenticatesOrganization;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesOrganization;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = AuthRedirectionConstants::ORGANIZATION_DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:organization')->except('logout');
    }
}
