<?php

namespace App\Http\Controllers;

use App\Filters\Filter;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct(
        protected SubCategoryService $subCategoryService,
    ) {
        // 
    }
    public function show($locale, SubCategory $subCategory, Filter $filter)
    {
        $jobs = $filter->apply($subCategory->jobs()->with(['category', 'subcategory', 'district', 'type']), request()->all());

        return view('pages.user.categories.show', compact('jobs'));
    }
}
