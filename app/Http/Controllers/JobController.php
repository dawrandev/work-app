<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Models\Job;
use App\Models\JobImage;
use App\Services\JobService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function __construct(protected JobService $jobService)
    {
        // 
    }

    public function index(Request $request)
    {
        $filters = $request->only(['category_id', 'district_id', 'type_id']);

        $jobs = $this->jobService->getFilteredJobs($filters);

        return view('pages.user.jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('pages.user.jobs.create');
    }

    public function store(JobStoreRequest $request)
    {
        $job = $this->jobService->createJob($request->validated(), $request);

        Alert::success(__('Request sent successfully!'));

        return redirect()->route('jobs.create');
    }

    public function show($locale, Job $job)
    {
        $job->load(['job_images', 'category', 'district', 'type']);

        return view('pages.user.jobs.show', compact('job'));
    }

    public function edit($locale, Job $job)
    {
        $job->load(['job_images', 'category', 'district', 'type']);

        return view('pages.user.jobs.edit', compact('job'));
    }

    public function update($locale, JobUpdateRequest $request, Job $job)
    {
        $job = $this->jobService->updateJob($job, $request->validated(), $request);

        Alert::success(__('Job updated successfully!'));

        return redirect()->route('profile.manage-jobs');
    }

    public function destroy($locale, Job $job)
    {
        $job->delete();

        Alert::success(__('Job deleted successfully!'));

        return redirect()->route('profile.manage-jobs');
    }
}
