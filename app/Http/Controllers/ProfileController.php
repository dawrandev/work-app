<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        protected JobService $jobService,
    ) {
        // Middleware can be added here if needed
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
        return view('pages.user.profile.my-resume');
    }

    public function bookmarked()
    {
        $jobs = $this->jobService->getUserJobs();

        return view('pages.user.profile.bookmarked', compact('jobs'));
    }
}
