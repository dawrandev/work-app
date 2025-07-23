<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Offer;
use App\Models\User;
use App\Services\JobSaveService;
use App\Services\JobService;
use App\Services\OfferSaveService;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct(
        protected JobSaveService $jobSaveService,
        protected JobService $jobService,
        protected OfferService $offerService,
        protected OfferSaveService $offerSaveService
    ) {
        //
    }

    public function index()
    {
        $user = auth()->user();

        return view('pages.user.profile.index', compact('user'));
    }

    public function changePassword()
    {
        return view('pages.user.profile.change-password');
    }

    public function myResume()
    {
        $offer = Offer::where('user_id', auth()->id())->with('user', 'category', 'subcategory', 'type', 'district', 'images')->first();

        return view('pages.user.profile.my-resume', compact('offer'));
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
        $offers = $this->offerSaveService->getUserSavedOffers(auth()->id());

        return view('pages.user.profile.saved-offers', compact('offers'));
    }

    public function savedJobs()
    {
        $jobs = $this->jobSaveService->getUserSavedJobs(auth()->id());

        return view('pages.user.profile.saved-jobs', compact('jobs'));
    }

    public function profile()
    {
        $user = auth()->user();

        return view('pages.user.profile.profile', compact('user'));
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();

        $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/users'), $imageName);

        $user->update([
            'image' => $imageName,
        ]);

        Alert::success(__('Profile image updated successfully!'));

        return redirect()->route('profile.profile');
    }



    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $data = $request->only(['first_name', 'last_name', 'phone']);
        $data['role'] = 'user';

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        Alert::success(__('Successfully Updated'));

        return redirect()->route('profile.profile');
    }
}
