<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasProfilMiddleware
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
        // check if user has already created cv profile
        if( !auth()->user()->userDetail ) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
