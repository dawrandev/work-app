<?php

use App\Models\Category;
use App\Models\District;
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
    return Category::all();
}

function getSubCategories()
{
    return SubCategory::with('category')
        ->orderBy('created_at', 'desc')
        ->get();
}
