<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Constants\AuthRedirectionConstants;
use App\Http\Controllers\Controller;
use App\Http\Traits\Admin\AuthenticatesAdmin;

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

    use AuthenticatesAdmin;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = AuthRedirectionConstants::ADMIN_DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
