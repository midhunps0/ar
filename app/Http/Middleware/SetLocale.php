<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request. Set Locale Middleware.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $locale = session('locale', config('app.locale'));
        $direction = $locale == 'ar' ? 'rtl' : 'ltr';

        app()->setLocale($locale);
        session(['direction' => $direction]);

        return $next($request);

    }
}
