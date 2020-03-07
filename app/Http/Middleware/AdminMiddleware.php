<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
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
        if(Auth::user()->usertype == 'admin'){
            return $next($request);
        }elseif(Auth::user()->usertype == 'user'){
            return redirect('/author/dashboard');
        }else{
            return redirect('/');
        }
        
    }
}
