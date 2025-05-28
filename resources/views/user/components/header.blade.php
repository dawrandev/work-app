<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="{{ route('home') }}">
                            <img class="logo1" src="{{asset('assets/images/logo/logo.svg')}}" alt="Logo" />
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
                                <li class="nav-item">
                                    <a class="active" href="index-2.html">{{ __('Home') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="index-2.html">{{ __('Home 1') }}</a></li>
                                        <li><a href="index2.html">{{ __('Home 2') }}</a></li>
                                        <li><a class="active" href="index3.html">{{ __('Home 3') }}</a></li>
                                        <li><a href="index4.html">{{ __('Home 4') }}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">{{ __('Pages') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="about-us.html">{{ __('About Us') }}</a></li>
                                        <li><a href="job-list.html">{{ __('Job List') }}</a></li>
                                        <li><a href="job-details.html">{{ __('Job Details') }}</a></li>
                                        <li><a href="resume.html">{{ __('Resume Page') }}</a></li>
                                        <li><a href="privacy-policy.html">{{ __('Privacy Policy') }}</a></li>
                                        <li><a href="faq.html">{{ __('Faq') }}</a></li>
                                        <li><a href="pricing.html">{{ __('Our Pricing') }}</a></li>
                                        <li><a href="404.html">{{ __('404 Error') }}</a></li>
                                        <li><a href="mail-success.html">{{ __('Mail Success') }}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">{{ __('Candidates') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="browse-jobs.html">{{ __('Browse Jobs') }}</a></li>
                                        <li><a href="browse-categories.html">{{ __('Browse Categories') }}</a></li>
                                        <li><a href="add-resume.html">{{ __('Add Resume') }}</a></li>
                                        <li><a href="job-alerts.html">{{ __('Job Alerts') }}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">{{ __('Employers') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="post-job.html">{{ __('Add Job') }}</a></li>
                                        <li><a href="manage-jobs.html">{{ __('Manage Jobs') }}</a></li>
                                        <li><a href="manage-applications.html">{{ __('Manage Applications') }}</a></li>
                                        <li><a href="manage-resumes.html">{{ __('Manage Resume') }}</a></li>
                                        <li><a href="browse-resumes.html">{{ __('Browse Resumes') }}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">{{ __('Blog') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-sidebar.html">{{ __('Blog Grid Sidebar') }}</a></li>
                                        <li><a href="blog-single.html">{{ __('Blog Single') }}</a></li>
                                        <li><a href="blog-single-sidebar.html">{{ __('Blog Single Sidebar') }}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="contact.html">{{ __('Contact') }}</a> </li>
                            </ul>
                        </div>
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
                        <div class="d-flex align-items-center">
                            @auth
                            <div class="user-name">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout-btn">
                                    {{__('Logout')}}
                                </button>
                            </form>
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