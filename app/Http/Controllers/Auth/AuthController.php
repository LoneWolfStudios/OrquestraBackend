<?php

namespace Orquestra\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Orquestra\User;
use Validator;
use Orquestra\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function getLogout() 
    {
        Auth::logout();
    
        return redirect()->to('auth/login');
    }
    
    public function postApiLogin (Request $request) 
    {
        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ])) 
        {
            return Auth::user();
        }
        
        return response()->json("Error", 500);
    }
    
	public function redirectPath() 
	{
		$user = Auth::user();

		if ($user->type == "user") 
		{
			return "/user";
		}

		if ($user->type == "admin") 
		{
			return "/admin";
		}

		return "/web";
	}

}
