<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobSaveStoreRequest;
use App\Services\JobSaveService;
use App\Services\SaveJobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JobSaveController extends Controller
{
    public function __construct(
        protected JobSaveService $jobSaveService,
    ) {
        // Middleware can be added here if needed
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(JobSaveStoreRequest $request)
    {
        $job = $this->jobSaveService->saveJob($request->validated(), $request);

        Alert::success(__('Job saved successfully!'));

        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        return $id;
    }
}
