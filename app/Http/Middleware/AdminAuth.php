<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check())
            return redirect(route('admin.login'));
        
        if (Auth::user()->getRole() != 'admin') {
            Auth::logout();
            return redirect(route('admin.login'));
        }
        return $next($request);
        
    }

}
