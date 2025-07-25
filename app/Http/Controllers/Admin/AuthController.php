<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\RegisterRequest;
use App\Services\Admin\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function __construct(protected ProfileService $profileService)
    {
        // 
    }

    public function showLogin()
    {
        return view('auth.admin.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();

            Alert::success(__('Succesfully login!'));

            return redirect()->route('admin.dashboard');
        } else {

            Alert::error(__('Phone or password is uncorrect!'));

            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('admin.showLogin');
    }

    public function profile()
    {
        return view('pages.admin.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $result = $this->profileService->updateProfile($user, $request->validated());

        if ($result['success']) {
            Alert::success($result['message']);
            return back();
        }

        Alert::error($result['message']);
    }
}
