<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {
        // 
    }
    public function index()
    {
        $categories = $this->categoryService->getCategories();

        return view('pages.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = $this->categoryService->createCategory($request->validated());

        Alert::success(__('Category created succesfully'));

        return redirect()->route('admin.categories.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($locale, Category $category)
    {
        return view('pages.admin.categories.edit', compact('category'));
    }

    public function update($locale, CategoryUpdateRequest $request, Category $category)
    {
        $result = $this->categoryService->updateCategory($request->validated(), $category);

        if ($result) {
            Alert::success(__('Category updated succesfully'));
        } else {
            Alert::success(__('Error updating category'));
        }

        return redirect()->route('admin.categories.index');
    }

    public function destroy($locale, Category $category)
    {
        $category->delete();

        Alert::success(__('Category deleted succesfully'));

        return redirect()->back();
    }
}
