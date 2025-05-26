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
        Alert::error(__('error'));

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
