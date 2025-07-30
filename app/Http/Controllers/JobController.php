<?php

namespace App\Http\Controllers;

use App\Filters\Filter;
use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Models\Job;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function __construct(protected JobService $jobService)
    {
        // 
    }

    public function index(Request $request, Filter $filter)
    {
        [$jobsData, $filters] = $this->jobService->getJobsWithFilters($request, $filter);

        return view('pages.user.jobs.index', compact('jobsData', 'filters'));
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
        $job->load(['images', 'category', 'district', 'type', 'user']);

        return view('pages.user.jobs.show', compact('job'));
    }

    public function edit($locale, Job $job)
    {
        $job->load(['images', 'category', 'district', 'type']);

        return view('pages.user.jobs.edit', compact('job'));
    }

    public function update($locale, JobUpdateRequest $request, Job $job)
    {
        $job = $this->jobService->updateJob($job, $request->validated(), $request);

        Alert::success(__('A request has been sent to update!'));

        return redirect()->route('profile.manage-jobs');
    }

    public function destroy($locale, Job $job)
    {
        $job->delete();

        Alert::success(__('Job deleted successfully!'));

        return redirect()->route('profile.manage-jobs');
    }
}
