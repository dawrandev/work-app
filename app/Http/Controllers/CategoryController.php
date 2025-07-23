<?php

namespace App\Http\Controllers;

use App\Filters\Filter;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
    ) {
        // 
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        return view('pages.user.categories.index', compact('categories'));
    }

    public function show($locale, Filter $filter, Category $category)
    {
        $jobs = $filter->apply($category->jobs()->with(['category', 'subcategory', 'district', 'type']), request()->all());

        return view('pages.user.categories.show', compact('category', 'jobs'));
    }
}
