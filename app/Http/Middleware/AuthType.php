<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {

        $redirect = $role.'/login';

        if(auth()->user() == null) {

            return redirect($redirect);
        }

        if (! $request->user()->hasRole($role)) {

            return redirect($redirect);
        }




        return $next($request);
    }
}
