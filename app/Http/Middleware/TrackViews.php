<?php

namespace App\Http\Middleware;

use App\Models\Job;
use App\Models\Offer;
use App\Models\ViewableView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $routeName = $request->route()->getName();

        if (in_array($routeName, ['jobs.show', 'offers.show'])) {
            $this->trackView($request, $routeName);
        }

        return $response;
    }

    private function trackView($request, $routeName)
    {
        $modelClass = $routeName === 'jobs.show' ? Job::class : Offer::class;
        $paramName = $routeName === 'jobs.show' ? 'job' : 'offer';

        // Bu yerda xatolik - route parameter dan ID olish kerak
        $modelId = $request->route($paramName);

        // Agar model instance kelsa, ID ni olish
        if (is_object($modelId)) {
            $modelId = $modelId->id;
        }

        $ipAddress = $request->ip();
        $userId = auth()->id();

        // Avval tekshiramiz
        $existingView = ViewableView::where([
            'viewable_id' => $modelId,
            'viewable_type' => $modelClass,
        ])->where(function ($query) use ($ipAddress, $userId) {
            $query->where('ip_address', $ipAddress);
            if ($userId) {
                $query->orWhere('user_id', $userId);
            }
        })->first();

        // Agar ko'rmagan bo'lsa, yangi record yaratamiz
        if (!$existingView) {
            ViewableView::create([
                'viewable_id' => $modelId,
                'viewable_type' => $modelClass,
                'ip_address' => $ipAddress,
                'user_id' => $userId,
                'viewed_at' => now(),
            ]);
        }
    }
}
