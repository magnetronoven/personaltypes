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
    public function handle($request, Closure $next)
    {
        $roles = Arr::except(func_get_args(), [0,1]);

        foreach($roles as $role) {
            if(Auth::user()->role->role === $role) {
                return $next($request);
            }
        }

        return abort(401);
    }
}
