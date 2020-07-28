<?php

namespace App\Http\Middleware;

use Closure;

class setLang
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
        if ($request->header('language')) {
            $lang = $request->header('language') == 'ar' || $request->header('language') == 'ar-EG' ? 'ar' : 'en';
            app()->setLocale($lang);
        }
        return $next($request);
    }
}
