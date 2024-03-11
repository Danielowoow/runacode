<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if (session()->has('applocale') && array_key_exists(session()->get('applocale'), config('app.locales'))) {
            app()->setLocale(session()->get('applocale'));
        }

        return $next($request);
    }
}