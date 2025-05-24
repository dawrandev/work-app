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
        $allowedLocales = ['ru', 'uz', 'kr'];
        $locale = $request->segment(1);

        if (in_array($locale, $allowedLocales)) {
            app()->setLocale($locale);
            session(['locale' => $locale]);
        } else {
            $locale = session('locale', config('app.locale'));
            app()->setLocale($locale);

            if ($locale && !$request->is('/')) {
                return redirect()->to('/' . $locale . $request->getPathInfo());
            }
        }

        return $next($request);
    }
}
