<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Offer;
use App\Models\User;
use Carbon\Carbon;

class DashboardRepository
{
    public function __construct(
        protected User $user,
        protected Job $job,
        protected Offer $offer,
        protected Category $category,
        protected District $district
    ) {
        // 
    }

    public function stats()
    {
        return [
            'total_users' => $this->user->where('role', 'user')->count(),
            'total_jobs' => $this->job->count(),
            'total_offers' => $this->offer->count(),
            'today_count' => $this->job->whereDate('created_at', Carbon::today())->count() + $this->offer->whereDate('created_at', Carbon::today())->count()
        ];
    }

    public function getMonthlyData($period)
    {
        $months = [];
        $jobsData = [];
        $offersData = [];

        for ($i = $period - 1; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->translatedFormat('F Y');

            $jobsData[] = $this->job->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)

                ->count();

            $offersData[] = $this->offer->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)

                ->count();
        }

        return [
            'months' => $months,
            'jobs' => $jobsData,
            'offers' => $offersData
        ];
    }

    public function getCategoryDistribution()
    {
        $categories = $this->category->withCount(['jobs', 'offers'])->get();

        return $categories->map(function ($category) {
            return [
                'name' => $category->translated_name,
                'jobs_count' => $category->jobs_count,
                'offers_count' => $category->offers_count,
                'total' => $category->jobs_count + $category->offers_count
            ];
        });
    }

    public function getDistrictDistribution()
    {
        $districts = $this->district->withCount(['jobs', 'offers'])->get();

        return $districts->map(function ($district) {
            return [
                'name' => $district->translated_name,
                'jobs_count' => $district->jobs_count,
                'offers_count' => $district->offers_count,
                'total' => $district->jobs_count + $district->offers_count
            ];
        })->sortByDesc('total')->take(10)->values();
    }
}
