<section class="hero-area style3">
    <!-- Single Slider -->
    <div class="hero-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 co-12">
                    <div class="inner-content">
                        <div class="hero-text">
                            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{__('Best for you')}}<br>{{__('We have brought the workplaces together!')}}
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay=".5s">{{__('Looking for work with us is now easy!')}}<br>{{__('Find your dream profession quickly and efficiently.')}}"<br>
                            </p>
                            <div class="button wow fadeInUp" data-wow-delay=".7s">
                                @if(auth()->check())
                                <a href="{{ route('jobs.create') }}" class="btn">{{ __('Post a Job') }}</a>
                                @else
                                <a href="javascript:void(0);" class="btn" data-toggle="modal" data-target="#login">
                                    {{ __('Post a Job') }}
                                </a>
                                @endif
                                <a href="{{ route('jobs.index') }}" class="btn btn-alt">{{ __('See Our Jobs') }}</a>
                            </div>
                        </div>
                        <div class="job-search-wrap-two mt-50 wow fadeInUp" data-wow-delay=".9s">
                            <div class="trending-keywords mt-30">
                                <div class="keywords style-two">
                                    <span class="title">Popular Keywords:</span>
                                    <ul>
                                        <li><a href="#">Administrative</a></li>
                                        <li><a href="#">Android</a></li>
                                        <li><a href="#">app</a></li>
                                        <li><a href="#">ASP.NET</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 co-12">
                    @livewire('cascade-select')
                </div>

            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>