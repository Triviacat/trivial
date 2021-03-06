<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function redirectTo()
    {
        return '/';
        return view('inici')->with('message', 'Us hem enviat un correu de verificació amb un enllaç per finalitzar el procés de registre.');
    }

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
        $validator = Validator::make($data, [
            'register_name' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'confirmed'],
            'register_password' => ['required', 'string', 'min:8', 'confirmed'],
            'beta_token' => ['required', 'string', 'min:10']
        ]);

        $validator->after(function ($validator) use ($data) {
            $token = DB::table('notify')
                ->where('email', $data['register_email'])
                ->where('token', $data['beta_token'])
                ->get();
            if (!isset($token[0])) {
                $validator->errors()->add('beta_token', 'Aquest codi no és vàlid');
            }
        });

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['register_name'],
            'email' => $data['register_email'],
            'password' => Hash::make($data['register_password']),
        ]);
    }
}
