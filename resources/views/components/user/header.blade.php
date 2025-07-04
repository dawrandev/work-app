<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="{{ route('home') }}">
                            <img class="logo1" src="{{asset('assets/user/images/logo/logo.svg')}}" alt="Logo" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <!-- Home -->
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">
                                        {{ __('Home') }}
                                    </a>
                                </li>

                                <!-- Jobs Dropdown -->
                                <li class="nav-item">
                                    <a href="#" class="{{ Route::is('jobs.*') ? 'active' : '' }}">
                                        {{ __('Jobs') }}
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('jobs.index') }}">{{ __('Browse Jobs') }}</a></li>
                                        @auth
                                        <li><a href="{{ route('jobs.create') }}">{{ __('Post Job') }}</a></li>
                                        <li><a href="{{ route('profile.manage-jobs') }}">{{ __('My Jobs') }}</a></li>
                                        @endauth
                                    </ul>
                                </li>

                                <!-- Offers Dropdown -->
                                <li class="nav-item">
                                    <a href="#" class="{{ Route::is('offers.*') ? 'active' : '' }}">
                                        {{ __('Offers') }}
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('offers.index') }}">{{ __('Browse Offers') }}</a></li>
                                        @auth
                                        <li><a href="{{ route('offers.create') }}">{{ __('Post Offer') }}</a></li>
                                        <li><a href="{{ route('profile.manage-offers') }}">{{ __('My Offers') }}</a></li>
                                        @endauth
                                    </ul>
                                </li>

                                <!-- Categories -->
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="{{ Route::is('categories.*') ? 'active' : '' }}">
                                        {{ __('Categories') }}
                                    </a>
                                </li>

                                <!-- About -->
                                <li class="nav-item">
                                    <a href="#}" class="{{ Route::is('about') ? 'active' : '' }}">
                                        {{ __('About') }}
                                    </a>
                                </li>

                                <!-- Contact -->
                                <li class="nav-item">
                                    <a href="#" class="{{ Route::is('contact') ? 'active' : '' }}">
                                        {{ __('Contact') }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Language Dropdown -->
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="languageDropdown" aria-expanded="false">
                                🌐 {{__(app()->getLocale()) }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                <li><a class="dropdown-item" href="{{ route('home', ['locale' => 'uz']) }}">{{__('uz')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['locale' => 'ru']) }}">{{__('ru')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['locale' => 'kr']) }}">{{__('kr')}}</a></li>
                            </ul>
                        </div>

                        <!-- Auth Section -->
                        <div class="d-flex align-items-center">
                            @auth
                            <!-- Profile Dropdown Button -->
                            <div class="profile-dropdown-wrapper ml-2">
                                <a href="{{ route('profile.index') }}" class="profile-btn">
                                    <i class="lni lni-user"></i>
                                </a>
                                <ul class="profile-dropdown-menu">
                                    <li><a href="{{ route('profile.index') }}"><i class="lni lni-user"></i> {{ __('My Profile') }}</a></li>
                                    <li><a href="#"><i class="lni lni-dashboard"></i> {{ __('Dashboard') }}</a></li>
                                    <li><a href="{{ route('profile.manage-jobs') }}"><i class="lni lni-briefcase"></i> {{ __('My Jobs') }}</a></li>
                                    <li><a href="{{ route('profile.manage-offers') }}"><i class="lni lni-files"></i> {{ __('My Offers') }}</a></li>
                                    <li><a href="#"><i class="lni lni-heart"></i> {{ __('Saved Jobs') }}</a></li>
                                    <li><a href="#"><i class="lni lni-heart-filled"></i> {{ __('Saved Offers') }}</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="lni lni-exit"></i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <div class="button mr-3">
                                <a href="javascript:" data-toggle="modal" data-target="#login" class="login">
                                    <i class="lni lni-lock-alt"></i> {{ __('Login') }}
                                </a>
                                <a href="javascript:" data-toggle="modal" data-target="#signup" class="btn">{{ __('Sign Up') }}</a>
                            </div>
                            @endauth
                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- navbar area -->
</header>