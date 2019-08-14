<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Session;
use App;
use Auth;

class Locale
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
        if (Auth::user())
        {
            Session::put('language', Auth::user()->language);
            App::setLocale(Auth::user()->language);
        }   
        else
        {
            App::setLocale(Session::get('language'));     
        }
        return $next($request);
    }
}
