<?php

namespace App\Http\Controllers;

use App\Filters\JobFilter;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct(
        protected SubCategoryService $subCategoryService,
    ) {
        // You can inject services or repositories here if needed
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, SubCategory $subCategory, JobFilter $filter)
    {
        $jobs = $filter->apply(
            $subCategory->jobs()->with(['category', 'subcategory', 'district', 'type']),
            request()->all()
        );

        return view('pages.user.categories.show', compact('category', 'jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
