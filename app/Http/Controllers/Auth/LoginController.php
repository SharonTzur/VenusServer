<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function login(Guard $auth, Request $request){

        $credentials = $request->only(['email', 'password']);

        if ($auth->attempt($credentials)) {
            $token = $auth->issue();
            $user = $auth->user();
            return response()->json([
                'errors' => false,
                'data'   => compact('token', 'user'),
            ]);
        }
        return response()->json(['errors'=>'Invalid email or password!'],401);

    }

}
