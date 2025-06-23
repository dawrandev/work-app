<?php

use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\SubCategory;
use App\Models\Type;

function getDistricts()
{
    return District::all();
}

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
