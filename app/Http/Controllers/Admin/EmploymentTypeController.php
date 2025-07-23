<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmploymentTypeStoreRequest;
use App\Http\Requests\Admin\EmploymentTypeUpdateRequest;
use App\Models\EmploymentType;
use App\Services\Admin\EmploymentTypeService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmploymentTypeController extends Controller
{
    public function __construct(protected EmploymentTypeService $employmentTypeService)
    {
        // 
    }

    public function index()
    {
        $employmentTypes = $this->employmentTypeService->getEmploymentTypes();

        return view('pages.admin.employment-types.index', compact('employmentTypes'));
    }

    public function create()
    {
        return view('pages.admin.employment-types.create');
    }

    public function store(EmploymentTypeStoreRequest $request)
    {
        $employmentType = $this->employmentTypeService->createEmploymentType($request->validated());

        Alert::success(__('Employment Type created successfully!'));

        return redirect()->route('admin.employment-types.index');
    }


    public function edit($locale, EmploymentType $employmentType)
    {
        return view('pages.admin.employment-types.edit', compact('employmentType'));
    }

    public function update($locale, EmploymentTypeUpdateRequest $request, EmploymentType $employmentType)
    {
        $result = $this->employmentTypeService->updateEmploymentType($request->validated(), $employmentType);

        if ($result) {
            Alert::success(__('Employment Type updated successfully!'));
        } else {
            Alert::error(__('Error updating employment type!'));
        }

        return redirect()->route('admin.employment-types.index');
    }

    public function destroy($locale, EmploymentType $employmentType)
    {
        $employmentType->delete();

        Alert::success(__('Employment Type deleted successfully!'));

        return redirect()->back();
    }
}
