<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class IsLogged
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
        if (Auth::check() == false){
            return redirect('/')->with('status', 'Page unavailable! Please login at first!');
        }else{
            return $next($request);
        }
    }
}
