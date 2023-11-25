<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale= Session::get('locale', Config::get('app.locale'));

        App::setLocale($locale);
        if($request->segment(1)=='ar' || $request->segment(1)=='en')
        {
            Session::put('locale', $request->segment(1));
            app()->setLocale($request->segment(1));
        }
        if($request->input('lang') == 'ar' || $request->input('lang') == 'en')
        {
            Session::put('locale', $request->input('lang'));
            app()->setLocale($request->input('lang'));
        }
        return $next($request);
    }
}
