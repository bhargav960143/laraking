<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/securepanel/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('securepanel.auth.login');
    }

    public function authenticated(Request $request, $user)
    {
        $userRoleName = $user->roles->pluck('name')->first();
        if($userRoleName == "administrator"){
            if($request->session()->has('user_info')){
                $user_info = session('user_info');
                $user_info['logged_in_id'] = $user['id'];
                $user_info['logged_in_name'] = $user['name'];
                $user_info['logged_in_email'] = $user['email'];
                $user_info['logged_in_role'] = Auth::user()->roles[0]['name'];
                session(['user_info' => $user_info]);
            }
            else{
                $user_info = session('user_info');
                $user_info['logged_in_id'] = $user['id'];
                $user_info['logged_in_name'] = $user['name'];
                $user_info['logged_in_email'] = $user['email'];
                $user_info['logged_in_role'] = Auth::user()->roles[0]['name'];
                session(['user_info' => $user_info]);
            }
        }
        else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
