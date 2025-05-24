<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        $allowedLocales = ['ru', 'uz', 'kr'];

        if (in_array($locale, $allowedLocales)) {
            app()->setlocale($locale);
            session(['locale' => $locale]);
        } else {
            app()->setLocale(session('locale', config('app.locale')));
        }

        return $next($request);
    }
}
