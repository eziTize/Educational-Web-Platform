<?php

namespace App\Http\Middleware;

use Closure;

class CheckSessionPass
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

        return route('login');

         if ($request->s_pass()) {
            return route('login');
        }

        if($request->input('s_pass') ==  $v_session->session_pass){
            return $next($request);
        }  
    }
}
