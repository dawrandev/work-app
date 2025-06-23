<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Services\JobSaveService;
use App\Services\JobService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        protected JobSaveService $jobSaveService,
        protected JobService $jobService
    ) {
        //
    }

    public function index()
    {
        return view('pages.user.profile.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function changePassword()
    {
        return view('pages.user.profile.change-password');
    }

    public function myResume()
    {
        $offer = Offer::where('user_id', auth()->id())
            ->with('user', 'category', 'subcategory', 'type', 'district', 'images')
            ->first();

        return view('pages.user.profile.my-resume', compact('offer'));
    }

    public function bookmarked()
    {
        $jobs = $this->jobSaveService->getUserJobs(auth()->id());

        return view('pages.user.profile.bookmarked', compact('jobs'));
    }

    public function manageJobs()
    {
        $jobs = $this->jobService->getUserJobs(auth()->id());

        return view('pages.user.profile.manage-jobs', compact('jobs'));
    }
}
