<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthetication
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
        if(Auth::user()->role->name == 'customer'){
            return redirect('/home');
        }
        
        return $next($request);
    }
}


/*
    ****************************************************************************
    |                   Documentation
    ****************************************************************************
    |1) Middleware:
    ****************************************************************************
    |      Function Handle:
    |      *********************
    |                       It works that when a user tries to access the dashboard
    |      or any other activaties that only allows to the Admin then it will prevent
    |      to access it by the user 
    |
    |
    |
    |
    |
    |
    |
    |
    |
    |
    |
    |
    ****************************************************************************
*/