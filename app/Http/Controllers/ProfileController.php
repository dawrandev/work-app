<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Services\JobSaveService;
use App\Services\JobService;
use App\Services\OfferService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        protected JobSaveService $jobSaveService,
        protected JobService $jobService,
        protected OfferService $offerService
    ) {
        //
    }

    public function index()
    {
        return view('pages.user.profile.index');
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

    public function manageOffers()
    {
        $offers = $this->offerService->getUserOffers(auth()->id());

        return view('pages.user.profile.manage-offers');
    }

    public function savedOffers()
    {
        return view('pages.user.profile.saved-offers');
    }
}
