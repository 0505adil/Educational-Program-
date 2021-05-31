<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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



    protected function redirectTo()
    {
        if (auth()->user()->role == 3) {
            return '/profile';
        }   else if(auth()->user()->role == 2){
            return '/tProfile';
        } else if (auth()->user()->role == 0){
            return '/admin';
        } else if (auth()->user()->role == 4){
            return '/depAdmin';
        } else if (auth()->user()->role == 1){
            return '/zavkaf';
        }

        Auth::logout();
        return redirect()->guest('/login')->with('alert', 'Access Restricted!');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
