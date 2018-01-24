<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Manager
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

        if(Auth::check() && Auth::user()->position == "manager" && Auth::user()->approve != 0 && Auth::user()->admin == 0 )
        {
                return $next($request);   
        }
        elseif(Auth::check() && Auth::user()->position == "manager" && Auth::user()->approve == 0 && Auth::user()->admin == 0 )
        {
                return redirect('waiting');  
        }
        // elseif(Auth::check() && Auth::user()->position == "teamlead" && Auth::user()->approve != 0)
        // {
        //         return redirect('teamlead');   
        // }
        elseif(Auth::check() && Auth::user()->position == "employee" && Auth::user()->approve != 0)
        {
           
                return redirect('employee_panel');
        }
        // elseif(Auth::check() && Auth::user()->position == "manager" && Auth::user()->approve != 0 && Auth::user()->admin != 0 )
        //     {
        //         return redirect('admin_panel');
        //     }
        return redirect()->back();
         //return $next($request); 
        
    }
}
