<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class ShortProviderAuth
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

        if (strpos($url, 'client-dashboard') !== false && empty(Auth::user()->client->institution)) {

            return redirect()->action('ShortController@dashboard');
        }

        return $next($request);
    }
}
