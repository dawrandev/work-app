<?php

use App\Models\Category;
use App\Models\District;
use App\Models\EmploymentType;
use App\Models\Job;
use App\Models\SubCategory;
use App\Models\Type;


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
        ->orderBy('created_at', 'desc')
        ->paginate(10);
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
