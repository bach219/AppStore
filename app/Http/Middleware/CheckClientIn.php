<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckClientIn
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
        if(Auth::guard('clients')->check())
            return redirect()->intended('account/'.Auth::guard('clients')->user()->id);
        return $next($request);
    }
}
