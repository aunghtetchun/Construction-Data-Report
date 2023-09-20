<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function redirectTo()
    {
        if (Auth::user()->role == 'admin')
        {
            return 'admin-home';  // admin dashboard path
        } elseif (Auth::user()->role == 'manager') {
            return 'manager-home';  // member dashboard path
        }else{
            return 'home';
        }
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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required'],
            'location' => ['required'],
            'work' => [ 'required'],
            'job' => [ 'required'],
            'nrc' => ['required', 'string','unique:users'],
            'address' => ['required', 'string'],
            'bio' => [ 'string','max:2000'],
            'count' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $city=$data['city'];
        if($city == 'new') {
            $city=$data['custom-city'];
        }
        $location=$data['location'];
        if($location == 'new') {
            $location=$data['custom-location'];
        }
        $work=$data['work'];
        if($work == 'new') {
            $work=$data['custom-work'];
        }
        $job=$data['job'];
        if($job == 'new') {
            $job=$data['custom-job'];
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'city' => $city,
            'location' => $location,
            'work' => $work,
            'job' => $job,
            'nrc' => $data['nrc'],
            'address' => $data['address'],
            'bio' => $data['bio'],
            'count' => $data['count'],
            'role'=> 'worker',
        ]);
    }
}
