<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Services\Admin\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct(protected JobService $jobService)
    {
        // 
    }

    public function index(Request $request)
    {
        $jobs = Job::with(['user', 'category', 'subcategory', 'district', 'type'])
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->approval_status, function ($query, $approval) {
                $query->where('approval_status', $approval);
            })
            ->when($request->category_id, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->paginate(15);

        $categories = Category::all();
        return view('pages.admin.jobs.index', compact('jobs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, Job $job)
    {
        $job->load(['images', 'category', 'subcategory', 'type', 'employmentType', 'district']);

        return view('pages.admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function reject()
    {
        // 
    }

    public function approve()
    {
        // 
    }
}
