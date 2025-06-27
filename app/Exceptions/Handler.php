<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $locale = $request->segment(1) ?? session('locale', config('app.locale', 'kr'));

        return redirect()->route('home', ['locale' => $locale])
            ->with('openLoginModal', true);
    }

    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            $statusCode = $exception->getStatusCode();

            // Locale'ni aniqlash va o'rnatish
            $segments = $request->segments();
            $locale = isset($segments[0]) && in_array($segments[0], ['uz', 'kr', 'ru']) ? $segments[0] : 'kr';
            app()->setLocale($locale);

            // View mavjudligini tekshirish
            if (view()->exists("errors.{$statusCode}")) {
                return response()->view("errors.{$statusCode}", [
                    'exception' => $exception,
                    'locale' => $locale
                ], $statusCode);
            }
        }

        return parent::render($request, $exception);
    }
}
