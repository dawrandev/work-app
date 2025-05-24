<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="index-2.html">
                            <img class="logo1" src="assets/images/logo/logo.svg" alt="Logo" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="active" href="index-2.html">{{__('Bas bet')}}</a>
                                    <ul class="sub-menu">
                                        <li><a href="index-2.html">Home 1</a></li>
                                        <li><a href="index2.html">Home 2</a></li>
                                        <li><a class="active" href="index3.html">Home 3</a></li>
                                        <li><a href="index4.html">Home 4</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="job-list.html">Job List</a></li>
                                        <li><a href="job-details.html">Job Details</a></li>
                                        <li><a href="resume.html">Resume Page</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="pricing.html">Our Pricing</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                        <li><a href="mail-success.html">Mail Success</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">Candidates</a>
                                    <ul class="sub-menu">
                                        <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                        <li><a href="browse-categories.html">Browse Categories</a></li>
                                        <li><a href="add-resume.html">Add Resume</a></li>
                                        <li><a href="job-alerts.html">Job Alerts</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">Employers </a>
                                    <ul class="sub-menu">
                                        <li><a href="post-job.html">Add Job</a></li>
                                        <li><a href="manage-jobs.html">Manage Jobs</a></li>
                                        <li><a href="manage-applications.html">Manage Applications</a></li>
                                        <li><a href="manage-resumes.html">Manage Resume</a></li>
                                        <li><a href="browse-resumes.html">Browse Resumes</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                        <li><a href="blog-single-sidebar.html">Blog Single Sibebar</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="contact.html">Contact </a> </li>
                            </ul>
                        </div>
                        <!-- navbar collapse -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                🌐 {{ app()->getLocale() }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                <li><a class="dropdown-item" href="{{ route('home', ['locale' => 'uz']) }}">uz</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['locale' => 'ru']) }}">ru</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['locale' => 'kr']) }}">kr</a></li>
                            </ul>
                        </div>
                        <div class="button">
                            <a href="javacript:" data-toggle="modal" data-target="#login" class="login"><i class="lni lni-lock-alt"></i> Login</a>
                            <a href="javacript:" data-toggle="modal" data-target="#signup" class="btn">Sign Up</a>
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