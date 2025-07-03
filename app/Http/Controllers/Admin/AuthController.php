<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
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
}
