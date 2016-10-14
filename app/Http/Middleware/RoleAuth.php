<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleAuth
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
        $url = $request->path();

        if(strpos($request->path(), 'admin') !== false && Auth::user()->hasRole('admin')){
            return $next($request);
        }
        if (strpos($url, 'short') !== false && Auth::user()->hasRole('short')) {
            return $next($request);
        }
        if (strpos($url, 'client-dashboard') !== false && Auth::user()->hasRole('client')) {

            return $next($request);
        }



        return redirect('/permission-error');
    }
}
