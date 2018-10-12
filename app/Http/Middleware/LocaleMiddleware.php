<?php

namespace App\Http\Middleware;

use Closure;
use config;
use Illuminate\Support\Facades\App;
use Session;

class LocaleMiddleware
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
        $lang = Session::get('website_language', config('app.locale'));
        App::setLocale($lang);

        return $next($request);
    }
}
