<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Lang;
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
protected function sendFailedLoginResponse(Request $request)
{
    return redirect()->to('/login')
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors([
            $this->username() => Lang::get('auth.failed'),
        ]);
}
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin';
protected function authenticated($request, $user)
    {
        if($user->hasRole('admin')){
            return redirect('/admin')->with('popup', 'open');
        }
        elseif($user->hasRole('teacher')){
            return redirect('/teacher')->with('popup', 'open');
        }
        elseif($user->hasRole('student')){
            return redirect('/student')->with('popup', 'open');
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
