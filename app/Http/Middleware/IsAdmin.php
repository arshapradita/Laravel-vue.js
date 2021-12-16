<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\Http\Client\Request;
use illuminate\support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->roles == "ADMIN")
        {
            return $next($request);
        }

        return redirect('/');
    }
}
