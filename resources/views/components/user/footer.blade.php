<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="download-text">
                        <h3>{{__('Download Our App')}}</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="download-button">
                        <div class="button">
                            <a class="btn" href="#"><i class="lni lni-apple"></i> {{__('App Store')}}</a>
                            <a class="btn" href="#"><i class="lni lni-play-store"></i> {{__('Google Play')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Middle Top -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="f-about single-footer">
                        <div class="logo">
                            <a href="{{ route('home') }}"><img src="{{asset('assets/user/images/logo/logo.svg')}}" alt="Logo"></a>
                        </div>
                        <p>{{__('Start building your creative website with our awesome template Massive.')}}</p>
                        <ul class="contact-address">
                            <li><span>{{__('Address')}}:</span> {{__('555 Wall Street, USA, NY')}}</li>
                            <li><span>{{__('Email')}}:</span> dawrandev@gmail.com</li>
                            <li><span>{{__('Call')}}:</span> +998-93-365-13-02</li>
                        </ul>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>{{__('For Candidates')}}</h3>
                                <ul>
                                    <li><a href="{{ route('profile.index') }}">{{__('User Dashboard')}}</a></li>
                                    <li><a href="{{ route('profile.my-resume') }}">{{__('My Resume')}}</a></li>
                                    <li><a href="{{ route('jobs.index') }}">{{__('Jobs Featured')}}</a></li>
                                    <li><a href="{{ route('jobs.index') }}">{{__('Jobs Listing')}}</a></li>
                                    <li><a href="{{ route('profile.saved-jobs') }}">{{__('Saved Jobs')}}</a></li>
                                    <li><a href="{{ route('job-applies.index') }}">{{__('My Applications')}}</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>{{__('For Employers')}}</h3>
                                <ul>
                                    <li><a href="{{ route('jobs.create') }}">{{__('Post New Job')}}</a></li>
                                    <li><a href="{{ route('offers.create') }}">{{__('Post New Offer')}}</a></li>
                                    <li><a href="{{ route('profile.manage-jobs') }}">{{__('Manage Jobs')}}</a></li>
                                    <li><a href="{{ route('profile.manage-offers') }}">{{__('Manage Offers')}}</a></li>
                                    <li><a href="{{ route('offers.index') }}">{{__('Offers Listing')}}</a></li>
                                    <li><a href="{{ route('profile.saved-offers') }}">{{__('Saved Offers')}}</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>{{__('Categories')}}</h3>
                                <ul>
                                    <li><a href="{{ route('categories.index') }}">{{__('All Categories')}}</a></li>
                                    <li><a href="{{ route('jobs.index') }}">{{__('Browse Jobs')}}</a></li>
                                    <li><a href="{{ route('offers.index') }}">{{__('Browse Offers')}}</a></li>
                                    <li><a href="{{ route('profile.profile') }}">{{__('My Profile')}}</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="left">
                            <p>{{__('Designed and Developed by')}} <a href="https://graygrids.com/" rel="nofollow" target="_blank">GrayGrids</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="right">
                            <ul>
                                <li><a href="#">{{__('Terms of use')}}</a></li>
                                <li><a href="#">{{__('Privacy Policy')}}</a></li>
                                <li><a href="#">{{__('FAQ')}}</a></li>
                                <li><a href="#">{{__('Contact')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
</footer>