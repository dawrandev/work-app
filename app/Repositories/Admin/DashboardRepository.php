<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Offer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function firstCardStats()
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

    public function getUsersCount($timeFilter = null, $categoryId = null, $districtId = null)
    {
        $query = $this->user->where('role', 'user');
        $this->applyTimeFilter($query, $timeFilter);

        return $query->count();
    }

    public function getJobsCount($timeFilter = null, $categoryId = null, $districtId = null)
    {
        $query = $this->job->query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($districtId) {
            $query->where('district_id', $districtId);
        }

        $this->applyTimeFilter($query, $timeFilter);

        return $query->count();
    }

    public function getOffersCount($timeFilter = null, $categoryId = null, $districtId = null)
    {
        $query = $this->offer->query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($districtId) {
            $query->where('district_id', $districtId);
        }

        $this->applyTimeFilter($query, $timeFilter);

        return $query->count();
    }

    public function getAppliesCount($timeFilter = null, $categoryId = null, $districtId = null)
    {
        $query = $this->buildAppliesQuery($timeFilter, $categoryId, $districtId);

        return $query->count();
    }

    public function getAcceptedAppliesCount($timeFilter = null, $categoryId = null, $districtId = null)
    {
        $query = $this->buildAppliesQuery($timeFilter, $categoryId, $districtId);

        return $query->where('status', 'accepted')->count();
    }

    private function buildAppliesQuery($timeFilter, $categoryId, $districtId)
    {
        $query = DB::table('job_applies');

        if ($timeFilter) {
            $this->applyTimeFilterToQuery($query, $timeFilter);
        }

        if ($categoryId) {
            $query->where(function ($q) use ($categoryId) {
                $q->whereIn('job_id', function ($subQuery) use ($categoryId) {
                    $subQuery->select('id')
                        ->from('jobs')
                        ->where('category_id', $categoryId);
                })
                    ->orWhereIn('offer_id', function ($subQuery) use ($categoryId) {
                        $subQuery->select('id')
                            ->from('offers')
                            ->where('category_id', $categoryId);
                    });
            });
        }

        if ($districtId) {
            $query->where(function ($q) use ($districtId) {
                $q->whereIn('job_id', function ($subQuery) use ($districtId) {
                    $subQuery->select('id')
                        ->from('jobs')
                        ->where('district_id', $districtId);
                })
                    ->orWhereIn('offer_id', function ($subQuery) use ($districtId) {
                        $subQuery->select('id')
                            ->from('offers')
                            ->where('district_id', $districtId);
                    });
            });
        }

        return $query;
    }

    private function applyTimeFilter($query, $timeFilter)
    {
        switch ($timeFilter) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }
    }

    private function applyTimeFilterToQuery($query, $timeFilter)
    {
        switch ($timeFilter) {
            case 'today':
                return $query->whereDate('created_at', Carbon::today());
            case 'week':
                return $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            case 'month':
                return $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
            case 'year':
                return $query->whereYear('created_at', Carbon::now()->year);
        }
    }
}
