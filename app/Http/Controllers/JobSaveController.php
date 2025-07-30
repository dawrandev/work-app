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

    public function store(JobSaveStoreRequest $request)
    {
        try {
            $this->jobSaveService->saveJob($request->validated(), $request);
            Alert::success(__('Job saved successfully!'));
        } catch (\Exception $e) {
            Alert::warning(__($e->getMessage() === 'Job already saved!' ? 'This job is already saved!' : 'Error occurred'));
        }

        return redirect()->back();
    }

    public function destroy($locale, string $id)
    {
        $this->jobSaveService->destroy($id);

        Alert::success(__('Job deleted successfully!'));

        return redirect()->back();
    }
}
