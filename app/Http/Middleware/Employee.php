<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Employee
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
        if( Auth::check() && Auth::user()->position =='employee' && Auth::user()->approve != 0  )
            
            {
                return $next($request);
            }
        elseif(Auth::check() && Auth::user()->position =='employee' && Auth::user()->approve == 0)
            {
                return redirect('waiting');
            }
        else
            {
                return redirect()->back();
            }
    }
}
