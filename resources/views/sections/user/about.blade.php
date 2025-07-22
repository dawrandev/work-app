    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 col-12">
                    <div class="content-left wow fadeInLeft" data-wow-delay=".3s">
                        <div calss="row">
                            <div calss="col-lg-6 col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <img class="single-img" src="{{ asset('assets/user/images/about/small1.jpg') }}" alt="#">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <img class="single-img mt-50" src="{{ asset('assets/user/images/about/small2.jpg') }}" alt="#">
                                    </div>
                                </div>
                            </div>
                            <div calss="col-lg-6 col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <img class="single-img minus-margin" src="{{ asset('assets/user/images/about/small3.jpg') }}" alt="#">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <!-- media body start -->
                                        <div class="media-body">
                                            <i class="lni lni-checkmark"></i>
                                            <h6 class="">{{__('Job alert!')}}</h6>
                                            <p>{{ __(':count new jobs are available this week!', ['count' => weeklyJobsCount()]) }}</p>
                                        </div>
                                        <!-- media body start -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 col-12">
                    <!-- content-1 start -->
                    <div class="content-right wow fadeInRight" data-wow-delay=".5s">
                        <!-- Heading -->
                        <h2>{{__('Help you to get the')}} <br>
                            {{__('best job that fits you')}}
                        </h2>
                        <!-- End Heading -->
                        <!-- Single List -->
                        <div class="single-list">
                            <i class="lni lni-grid-alt"></i>
                            <!-- List body start -->
                            <div class="list-bod">
                                <h5>{{__('#1 Jobs site in KK')}}</h5>
                                <p>{{__('Leverage agile frameworks to provide a robust synopsis for high level overviews')}}</p>
                            </div>
                            <!-- List body start -->
                        </div>
                        <!-- End Single List -->
                        <!-- Single List -->
                        <div class="single-list">
                            <i class="lni lni-search"></i>
                            <!-- List body start -->
                            <div class="list-bod">
                                <h5>{{__('Seamless searching')}}</h5>
                                <p>{{__('Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                                test')}}</p>
                            </div>
                            <!-- List body start -->
                        </div>
                        <!-- End Single List -->
                        <!-- Single List -->
                        <div class="single-list">
                            <i class="lni lni-stats-up"></i>
                            <!-- List body start -->
                            <div class="list-bod">
                                <h5>{{__('Hired in top companies')}}</h5>
                                <p>{{__('Podcasting operational change management inside of workflows to establish')}}.</p>
                            </div>
                            <!-- List body start -->
                        </div>
                        <!-- End Single List -->
                    </div>
                </div>
            </div>
        </div>
    </section>