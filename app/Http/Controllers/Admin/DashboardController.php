<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\EmploymentType;
use App\Models\Job;
use App\Models\Offer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_jobs' => Job::count(),
            'total_offers' => Offer::count(),
            'today_count' => Job::whereDate('created_at', Carbon::today())->count() +
                Offer::whereDate('created_at', Carbon::today())->count()
        ];

        // Oylik dinamika (oxirgi 6 oy)
        $monthlyData = $this->getMonthlyData();

        // Kategoriyalar bo'yicha taqsimot
        $categoryDistribution = $this->getCategoryDistribution();

        // Tumanlar bo'yicha taqsimot
        $districtDistribution = $this->getDistrictDistribution();

        // Ish turlari bo'yicha taqsimot
        $employmentDistribution = $this->getEmploymentDistribution();

        // Status bo'yicha taqsimot
        $statusDistribution = $this->getStatusDistribution();

        // So'nggi qo'shilgan ishlar
        $recentJobs = Job::with(['category', 'district', 'user'])
            ->latest()
            ->take(7)
            ->get()
            ->map(function ($job) {
                return [
                    'id' => $job->id,
                    'title' => $job->title,
                    'category' => $job->category->translated_name,
                    'district' => $job->district->translated_name,
                    'salary' => number_format($job->salary_from) . ' - ' . number_format($job->salary_to),
                    'status' => $job->status,
                    'approval_status' => $job->approval_status,
                    'created_at' => $job->created_at->format('d.m.Y H:i'),
                    'user' => $job->user->first_name . ' ' . $job->user->last_name
                ];
            });

        // So'nggi qo'shilgan takliflar
        $recentOffers = Offer::with(['category', 'district', 'user'])
            ->latest()
            ->take(7)
            ->get()
            ->map(function ($offer) {
                return [
                    'id' => $offer->id,
                    'title' => $offer->title,
                    'category' => $offer->category->translated_name,
                    'district' => $offer->district->translated_name,
                    'salary' => number_format($offer->salary_from) . ' - ' . number_format($offer->salary_to),
                    'status' => $offer->status,
                    'approval_status' => $offer->approval_status,
                    'created_at' => $offer->created_at->format('d.m.Y H:i'),
                    'user' => $offer->user->first_name . ' ' . $offer->user->last_name
                ];
            });

        // Filterlar uchun ma'lumotlar
        $filters = [
            'categories' => Category::all()->map(function ($cat) {
                return [
                    'id' => $cat->id,
                    'name' => $cat->translated_name
                ];
            }),
            'districts' => District::all()->map(function ($dist) {
                return [
                    'id' => $dist->id,
                    'name' => $dist->translated_name
                ];
            }),
            'employment_types' => EmploymentType::all()->map(function ($type) {
                return [
                    'id' => $type->id,
                    'name' => $type->translated_name
                ];
            })
        ];

        return view('pages.admin.dashboard', compact(
            'stats',
            'monthlyData',
            'categoryDistribution',
            'districtDistribution',
            'employmentDistribution',
            'statusDistribution',
            'recentJobs',
            'recentOffers',
            'filters'
        ));
    }

    private function getMonthlyData()
    {
        $months = [];
        $jobsData = [];
        $offersData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->translatedFormat('F');

            $jobsData[] = Job::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $offersData[] = Offer::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }

        return [
            'months' => $months,
            'jobs' => $jobsData,
            'offers' => $offersData
        ];
    }

    private function getCategoryDistribution()
    {
        $categories = Category::withCount(['jobs', 'offers'])->get();

        return $categories->map(function ($category) {
            return [
                'name' => $category->translated_name,
                'jobs_count' => $category->jobs_count,
                'offers_count' => $category->offers_count,
                'total' => $category->jobs_count + $category->offers_count
            ];
        });
    }

    private function getDistrictDistribution()
    {
        $districts = District::withCount(['jobs', 'offers'])->get();

        return $districts->map(function ($district) {
            return [
                'name' => $district->translated_name,
                'jobs_count' => $district->jobs_count,
                'offers_count' => $district->offers_count,
                'total' => $district->jobs_count + $district->offers_count
            ];
        })->sortByDesc('total')->take(10)->values();
    }

    private function getEmploymentDistribution()
    {
        $types = EmploymentType::withCount(['jobs', 'offers'])->get();

        return $types->map(function ($type) {
            return [
                'name' => $type->translated_name,
                'jobs_count' => $type->jobs_count,
                'offers_count' => $type->offers_count,
                'total' => $type->jobs_count + $type->offers_count
            ];
        });
    }

    private function getStatusDistribution()
    {
        $statuses = ['active', 'paused', 'closed', 'expired', 'draft'];
        $result = [];

        foreach ($statuses as $status) {
            $result[] = [
                'name' => ucfirst($status),
                'jobs_count' => Job::where('status', $status)->count(),
                'offers_count' => Offer::where('status', $status)->count()
            ];
        }

        return $result;
    }

    // AJAX so'rovlar uchun
    public function getFilteredData()
    {
        $category_id = request('category_id');
        $district_id = request('district_id');
        $date_range = request('date_range', 'month');

        $query_jobs = Job::query();
        $query_offers = Offer::query();

        if ($category_id) {
            $query_jobs->where('category_id', $category_id);
            $query_offers->where('category_id', $category_id);
        }

        if ($district_id) {
            $query_jobs->where('district_id', $district_id);
            $query_offers->where('district_id', $district_id);
        }

        switch ($date_range) {
            case 'today':
                $query_jobs->whereDate('created_at', Carbon::today());
                $query_offers->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query_jobs->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                $query_offers->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'month':
                $query_jobs->whereMonth('created_at', Carbon::now()->month);
                $query_offers->whereMonth('created_at', Carbon::now()->month);
                break;
            case 'year':
                $query_jobs->whereYear('created_at', Carbon::now()->year);
                $query_offers->whereYear('created_at', Carbon::now()->year);
                break;
        }

        return response()->json([
            'jobs_count' => $query_jobs->count(),
            'offers_count' => $query_offers->count()
        ]);
    }

    // Job o'chirish
    public function deleteJob($id)
    {
        try {
            Job::findOrFail($id)->delete();
            return response()->json(['success' => true, 'message' => 'Ish muvaffaqiyatli o\'chirildi']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Xatolik yuz berdi'], 500);
        }
    }

    // Offer o'chirish
    public function deleteOffer($id)
    {
        try {
            Offer::findOrFail($id)->delete();
            return response()->json(['success' => true, 'message' => 'Taklif muvaffaqiyatli o\'chirildi']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Xatolik yuz berdi'], 500);
        }
    }
}
