<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth; 

class Test
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
        if(Auth::check()){
            // if(Auth::user()->usertype =='Admin'){
            //     dd('PHP deperment and room number 501');
            // }
            // elseif(Auth::user()->usertype=='User'){
            //     dd('ASP.net Depertment room number is 401'); 
            // }
                  return $next($request);

        }
        else{
            return redirect('/login');
        }
        
    }
}
