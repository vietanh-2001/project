<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!(session()->has('LoggedUser'))){
            return redirect('/doctorlogin');
        }
        return $next($request);
    }
}
