<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Administrator Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
            return redirect()->intended('dashboard');
        return view('admin.login');
    }

    /**
     * Process admin logout and handle request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->intended(route('admin.login'));
    }

    /**
     * Process admin login and handle request
     *
     * @return \Illuminate\Http\Response
     */
    public function handlelogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(Auth::user()->role_id != 1)
            {
                Auth::logout();
                return redirect()->intended(route('admin.login'))->withInput()->with('error', 'Unauthorised login');
            }
            return redirect()->intended('dashboard');
        }
    }
}
