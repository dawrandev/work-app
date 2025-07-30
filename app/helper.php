<?php

use App\Models\Category;
use App\Models\District;
use App\Models\EmploymentType;
use App\Models\Job;
use App\Models\SubCategory;
use App\Models\Type;
use Carbon\Carbon;


function getTypes()
{
    return Type::all();
}

function getCategories()
{
    return Category::orderBy('created_at', 'desc')->get();
}

function getSubCategories()
{
    return SubCategory::with('category')
        ->orderBy('created_at', 'desc')
        ->get();
}

function getJobs()
{
    return Job::with(['category', 'subcategory', 'district', 'type', 'images'])
        ->latest()
        ->limit(8)
        ->get();
}

function getMostViewedJobs($limit = 8)
{
    return Job::select('jobs.*')
        ->with(['category', 'subcategory', 'district', 'type', 'images'])
        ->join('viewable_views', function ($join) {
            $join->on('jobs.id', '=', 'viewable_views.viewable_id')
                ->where('viewable_views.viewable_type', Job::class);
        })
        ->selectRaw('COUNT(viewable_views.id) as views_count')
        ->groupBy('jobs.id')
        ->orderByDesc('views_count')
        ->limit($limit)
        ->get();
}

function getEmploymentTypes()
{
    return EmploymentType::all();
}

function statuses()
{
    return [
        'active' => 'Active',
        'paused' => 'Paused',
        'closed' => 'Closed',
    ];
}

function approvalStatuses()
{
    return [
        'pending' => 'Pending',
        'approved' => 'Approved',
        'rejected' => 'Rejected'
    ];
}

if (!function_exists('approvalStatuses')) {
    function approvalStatuses()
    {
        return [
            'pending' => __('Pending'),
            'approved' => __('Approved'),
            'rejected' => __('Rejected')
        ];
    }
}
if (!function_exists('getDistricts')) {
    function getDistricts()
    {
        return District::all();
    }
}

if (!function_exists('getTypes')) {
    function getTypes()
    {
        return Type::all();
    }
}

function weeklyJobsCount()
{
    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    return Job::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
}
