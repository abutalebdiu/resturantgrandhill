<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }







    public function redirectTo(){

        $user = Auth::user();

        if($user->role_id == 1){
            return "/admin-dashboard";
        }else if($user->role_id == 2){
            return "/stuff-dashboard";
        }else if($user->role_id == 3){
            return "/agency-dashboard";
        }
        else if($user->role_id == 4){
            return "/artist-dashboard";
        }else if($user->role_id == 5){
            return "/user-dashboard";
        }else if($user->role_id == 6){
            return "/vendor-dashboard";
        }else{
            return "/error";
        }

    }









}
