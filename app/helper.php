<?php

use App\Models\Category;
use App\Models\District;
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
