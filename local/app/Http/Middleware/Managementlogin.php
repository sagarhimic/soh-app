<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Managementlogin
{
    public function handle($request, Closure $next)
    {
        // Check if management user is logged in
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first');
        }
        
        return $next($request);
    }
}
