<?php

namespace App\Http\Controllers\Organization\Auth;

use App\Constants\AuthRedirectionConstants;
use App\Http\Controllers\Controller;
use App\Http\Traits\Organization\RegistersOrganization;
use App\Models\Organization;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersOrganization;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:organizations'],
            'phone_number' => ['required', 'string', 'max:255'],
            'cnic' => ['required', 'string',  'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create($request)
    {
        return Organization::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'cnic' => $request->cnic,
            'password' => Hash::make($request->password),
        ]);
    }
}
