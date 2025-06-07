@php
$sectionClass = 'change-password';
@endphp

@extends('pages.user.profile.index')

@section('profile-content')
<div class="col-lg-8">
    <div class="password-content">
        <h3>{{ __('Change Password') }}</h3>
        <p>{{ __('Here you can change your password please fill up the form.') }}</p>
        <form action="{{ route('auth.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ __('Old Password') }}</label>
                        <input class="form-control" type="password" name="old_password">
                        @error('old_password')
                        <li style="color: red;">{{ $message }}</li>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ __('New Password') }}</label>
                        <input class="form-control" type="password" name="password">
                        @error('new_password')
                        <li style="color: red;">{{ $message }}</li>
                        @enderror
                        <i class="bx bxs-low-vision"></i>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group last">
                        <label>{{ __('Confirm Password') }}</label>
                        <input class="form-control" type="password" name="password_confirmation">
                        @error('password_confirmation')
                        <li style="color: red;">{{ $message }}</li>
                        @enderror
                        <i class="bx bxs-low-vision"></i>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="button">
                        <button class="btn">{{ __('Save Change') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection