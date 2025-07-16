<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\EmploymentType;
use App\Models\Job;
use App\Models\Offer;
use App\Models\User;
use App\Services\Admin\DashboardService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $dashboardService)
    {
        // 
    }

    public function dashboard(Request $request, $locale = null, $period = null)
    {
        $period = $period ?: $request->get('period', 6);

        $firstCardStats = $this->dashboardService->firstCardStats();

        $secondCardStats = $this->dashboardService->secondCardStats($request->get('time', 'month'), $request->get('category_id'), $request->get('district_id'));

        $monthlyData = $this->dashboardService->getMonthlyData($period);

        $categoryDistribution = $this->dashboardService->getCategoryDistribution();

        $districtDistribution = $this->dashboardService->getDistrictDistribution();

        return view('pages.admin.dashboard', compact(
            'firstCardStats',
            'secondCardStats',
            'monthlyData',
            'categoryDistribution',
            'districtDistribution',
            'period'
        ));
    }

    public function getChartData($locale, $data)
    {
        $period = (int) $data;

        $request = request();

        $request->merge(['period' => $period]);

        return $this->dashboard($request, $locale, $period);
    }
}
