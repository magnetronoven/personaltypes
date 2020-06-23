<?php

namespace App\Http\Middleware;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(Auth::user()->hasAnyRole($roles)) {
            return $next($request);
        }

        return abort(401);
    }
}
