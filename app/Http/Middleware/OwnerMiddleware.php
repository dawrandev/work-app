<?php

namespace App\Http\Middleware;

use App\Models\Job;
use App\Models\Offer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $currentUserId = auth()->id();
        $routeParameters = $request->route()->parameters();

        foreach ($routeParameters as $parameterName => $parameterValue) {
            $isOwner = $this->checkOwnership($parameterName, $parameterValue, $currentUserId);

            if (!$isOwner) {
                abort(403, 'Only the owner can access this information.');
            }
        }
        return $next($request);
    }

    private function checkOwnership($paramName, $paramValue, $userId)
    {
        switch ($paramName) {

            case 'job':
                if ($paramValue instanceof Job) {
                    return $paramValue->user_id == $userId;
                } else {
                    return Job::where('id', $paramValue)
                        ->where('user_id', $userId)
                        ->exists();
                }

            case 'offer':
                if ($paramValue instanceof Offer) {
                    return $paramValue->user_id == $userId;
                } else {
                    return Offer::where('id', $paramValue)
                        ->where('user_id', $userId)
                        ->exists();
                }

            case 'id':
                return $this->checkIdParameter($paramValue, $userId);

            default:
                return true;
        }
    }

    private function checkIdParameter($parameterValue, $currentUserId)
    {
        $routeName = request()->route()->getName();

        if (str_contains($routeName, 'save_jobs')) {
            return DB::table('save_jobs')
                ->where('id', $parameterValue)
                ->where('user_id', $currentUserId)
                ->exists();
        } elseif (str_contains($routeName, 'save_offers')) {
            return DB::table('save_offers')
                ->where('id', $parameterValue)
                ->where('user_id', $currentUserId)
                ->exists();
        } elseif (str_contains($routeName, 'job_applies')) {
            return DB::table('job_applies')
                ->where('id', $parameterValue)
                ->where('user_id', $currentUserId)
                ->exists();
        } elseif (str_contains($routeName, 'offer_applies')) {
            return DB::table('offer_applies')
                ->where('id', $parameterValue)
                ->where('user_id', $currentUserId)
                ->exists();
        }
        return false;
    }
}
