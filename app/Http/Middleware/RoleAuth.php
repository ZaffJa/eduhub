<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $request->path();

        if (strpos($request->path(), 'admin') !== false && Auth::user()->hasRole('admin')) {
            return $next($request);
        }
        if (strpos($url, 'short') !== false && Auth::user()->hasRole('short')) {
            return $next($request);
        }
        if (strpos($url, 'client-dashboard') !== false && Auth::user()->hasRole('client')) {
            return $next($request);
        }
        if (strpos($url, 'student') !== false && Auth::user()->hasRole('student')) {
            return $next($request);
        }

        if (strpos($url, 'school') !== false && Auth::user()->hasRole('school')) {
            return $next($request);
        } else if (strpos($url, 'school') !== false && !Auth::user()->hasRole('school')) {

            return redirect('/login')->with('status', 'Please sign in first!');
        } else {
            $redirect_url = '';
            if (Auth::user()->hasRole('admin'))
                $redirect_url = '/';
            else if (Auth::user()->hasRole('client'))
                $redirect_url = '/client-dashboard';
            else if (Auth::user()->hasRole('short'))
                $redirect_url = '/short';
            else if (Auth::user()->hasRole('student'))
                $redirect_url = '/student';

            return redirect($redirect_url)->with('status', 'Permission Error!');
        }


        return redirect('/permission-error');
    }
}
