<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLang
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $lang
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = request()->header('locale');

        if($lang === 'ar') {
            app()->setLocale('ar');

        } elseif($lang === 'en') {
            app()->setLocale('en');
        }

        return $next($request);
    }
}
