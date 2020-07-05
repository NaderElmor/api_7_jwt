<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguage
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
        //make the language of the app Arabic by default
        app()->setLocale('ar');

        if(isset($request->lang) && $request->lang == 'en'){
            app()->setLocale('en');
        }

        return $next($request);
    }
}
