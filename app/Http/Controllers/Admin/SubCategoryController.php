<?php

namespace App\Http\Controllers\Admin;

use App\Filters\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\Admin\SubCategoryService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    public function __construct(protected SubCategoryService $subCategoryService)
    {
        // 
    }

    public function index(Request $request, Filter $filters)
    {
        $subcategories = $this->subCategoryService->getFilteredCategory($request->only(['search', 'category_id', 'per_page']));

        return view('pages.admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        return view('pages.admin.subcategories.create');
    }

    public function store(SubCategoryRequest $request)
    {
        $subcategories = $this->subCategoryService->createSubcategory($request->validated());

        Alert::success(__('Subcategory created successfully!'));

        return redirect()->route('admin.subcategories.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($locale, SubCategory $subcategory)
    {
        return view('pages.admin.subcategories.edit', compact('subcategory'));
    }

    public function update($locale, SubCategoryUpdateRequest $request, SubCategory $subcategory)
    {
        $result = $this->subCategoryService->updateSubcategory($request->validated(), $subcategory);

        if ($result) {
            Alert::success(__('Subcategory updated successfully!'));
        } else {
            Alert::error(__('Error updating subcategory!'));
        }

        return redirect()->route('admin.subcategories.index');
    }

    public function destroy($locale, SubCategory $subcategory)
    {
        $subcategory->delete();

        Alert::success(__('Subcategory deleted succesfully!'));

        return redirect()->route('admin.subcategories.index');
    }
}
