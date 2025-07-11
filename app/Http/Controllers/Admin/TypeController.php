<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeStoreRequest;
use App\Http\Requests\Admin\TypeUpdateRequest;
use App\Models\Type;
use App\Services\Admin\TypeService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{
    public function __construct(protected TypeService $typeService)
    {
        // 
    }

    public function index()
    {
        $types = $this->typeService->getTypes();

        return view('pages.admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('pages.admin.types.create');
    }

    public function store(TypeStoreRequest $request)
    {
        $type = $this->typeService->createType($request->validated());

        Alert::success(__('Type created successfully'));

        return redirect()->route('admin.types.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($locale, Type $type)
    {
        return view('pages.admin.types.edit', compact('type'));
    }

    public function update($locale, TypeUpdateRequest $request, Type $type)
    {
        $result = $this->typeService->updateType($request->validated(), $type);

        if ($result) {
            Alert::success(__('Type updated successfully'));
        } else {
            Alert::error(__('Error updating type'));
        }

        return redirect()->route('admin.types.index');
    }

    public function destroy($locale, Type $type)
    {
        $type->delete();

        Alert::success(__('Type deleted successfully'));

        return redirect()->back();
    }
}
