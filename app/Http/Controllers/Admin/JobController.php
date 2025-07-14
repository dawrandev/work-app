<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobUpdateRequest;
use App\Models\Category;
use App\Models\Job;
use App\Services\Admin\JobService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    public function __construct(protected JobService $jobService)
    {
        // 
    }

    public function index(Request $request)
    {
        $jobs = $this->jobService->getJobs($request);

        return view('pages.admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($locale, Job $job)
    {
        $job->load(['images', 'category', 'subcategory', 'type', 'employment_type', 'district', 'user']);

        return view('pages.admin.jobs.show', compact('job'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update($locale, JobUpdateRequest $request, Job $job)
    {
        $job = $this->jobService->updateJobStatus($request->status, $job);
        if ($job) {
            Alert::success(__('Job approval status updated successfully'));
        } else {
            Alert::error(__('Error updating approval status'));
        }
        return redirect()->route('admin.jobs.index');
    }

    public function destroy($locale, Job $job)
    {
        $job->delete();

        Alert::success(__('Job deleted successfully'));

        return redirect()->route('admin.jobs.index');
    }
}
