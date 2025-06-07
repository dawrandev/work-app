@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Profile')" :description="''" :page="__('Profile')" />

<div class="{{ $sectionClass ?? 'default-section' }} section">
    <div class="container">
        <div class="alerts-inner">
            <div class="row">
                <!-- Start sidebar -->
                <div class="col-lg-4 col-12">
                    <div class="dashbord-sidebar">
                        <ul>
                            <li class="heading">{{ __('Manage Account') }}</li>
                            <li>
                                <a href="{{ route('profile.my-resume') }}" class="{{ Route::is('profile.my-resume') ? 'active' : '' }}">
                                    <i class="lni lni-clipboard"></i> {{ __('My Resume') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.bookmarked') }}" class="{{ Route::is('profile.bookmarked') ? 'active' : '' }}">
                                    <i class="lni lni-bookmark"></i> {{ __('Bookmarked Jobs') }}
                                </a>
                            </li>
                            <li>
                                <a href="notifications.html">
                                    <i class="lni lni-alarm"></i> {{ __('Notifications') }} <span class="notifi">5</span>
                                </a>
                            </li>
                            <li>
                                <a href="manage-applications.html">
                                    <i class="lni lni-envelope"></i> {{ __('Manage Applications') }}
                                </a>
                            </li>
                            <li>
                                <a href="manage-jobs.html">
                                    <i class="lni lni-briefcase"></i> {{ __('Manage Jobs') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}" class="{{ Route::is('auth.edit') ? 'active' : '' }}">
                                    <i class="lni lni-lock"></i> {{ __('Change Password') }}
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="lni lni-upload"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End sidebar -->

                <!-- Profile Content -->
                @yield('profile-content')
                <!-- End Profile Content -->

            </div>
        </div>
    </div>
</div>
@endsection