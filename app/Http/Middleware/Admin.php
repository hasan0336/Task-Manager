<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        if(Auth::check() && Auth::user()->position == "manager" && Auth::user()->approve != 0 && Auth::user()->admin != 0 && Auth::user()->email == "admin@gmail.com")
                {
                    return $next($request);
                }
                else{
            return redirect()->back();
        }
    }
}
