<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DistrictStoreRequest;
use App\Http\Requests\Admin\DistrictUpdateRequest;
use App\Models\District;
use App\Services\Admin\DistrictService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DistrictController extends Controller
{
    public function __construct(protected DistrictService $districtService)
    {
        // 
    }

    public function index()
    {
        $districts = $this->districtService->getDistricts();

        return view('pages.admin.districts.index', compact('districts'));
    }

    public function create()
    {
        return view('pages.admin.districts.create');
    }

    public function store(DistrictStoreRequest $request)
    {
        $district = $this->districtService->createDistrict($request->validated());

        Alert::success(__('District created successfully!'));

        return redirect()->route('admin.districts.index');
    }

    public function edit($locale, District $district)
    {
        return view('pages.admin.districts.edit', compact('district'));
    }

    public function update($locale, DistrictUpdateRequest $request, District $district)
    {
        $result = $this->districtService->updateDistrict($request->validated(), $district);

        if ($result) {
            Alert::success(__('District updated successfully!'));
        } else {
            Alert::error(__('Error updating district!'));
        }

        return redirect()->route('admin.districts.index');
    }

    public function destroy($locale, District $district)
    {
        $district->delete();

        Alert::success(__('District deleted successfully!'));

        return redirect()->back();
    }
}
