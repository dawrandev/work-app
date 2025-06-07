<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create(
            [
                'role' => 'user',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]
        );

        Auth::login($user);

        Alert::success(__('Registration successful'));

        return redirect()->route('home');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();

            Alert::success(__('Successfully login!'));

            return redirect()->route('home');
        }
        Alert::error(__('Login failed. Please enter the correct phone number and password'));

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function edit()
    {
        return view('pages.user.profile.change-password');
    }
    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!$user instanceof \App\Models\User) {
            Alert::error(__('User not found.'));
            return back()->withErrors(['user' => __('User not found.')]);
        }

        if (!Hash::check($request->old_password, $user->password)) {
            Alert::error(__('Old password is incorrect.'));
            return back()->withErrors(['old_password' => __('Old password is incorrect.')]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success(__('Password changed successfully.'));
        return redirect()->route('home');
    }
}
