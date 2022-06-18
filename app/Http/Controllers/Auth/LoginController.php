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
   //  protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated()
    {
         if (Auth::user()->user_type == 1) {
            return redirect()->route('admin.dashboard')->with('status' ,'wellcome to Admin Dashboard');
         }
         else if(Auth::user()->user_type == 0){

            return redirect()->route('user.dashboard')->with('status' ,'Login In Successfull');  
         }
         else{
            return redirect('/');
         }
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
