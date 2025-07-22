<section class="find-job section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">{{ __('Hot Jobs') }}</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ __('Browse Recent Jobs') }}</h2>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                @foreach (getJobs() as $job)
                <div class="col-lg-6 col-12">
                    <!-- Single Job -->
                    <div class="single-job">
                        <div class="job-image">
                            <i class="{{ $job->category->icon }}" style="font-size: 3rem;"></i>
                        </div>
                        <div class="job-content">
                            <h4>
                                <a href="{{ route('jobs.show', $job->id) }}">{{ $job->category->translated_name }}</a> <br>
                                <a href="{{ route('jobs.show', $job->id) }}">{{ $job->subcategory->translated_name }}</a>
                            </h4>
                            <p>{{ $job->title }}</p>
                            <ul>
                                <li>{{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }} sum</li>
                                <li><i class="lni lni-map-marker"></i>{{ $job->district->translated_name }}</li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                <li><a href="{{ route('jobs.show', ['job' => $job->id]) }}">{{ __('Details') }}</a></li>
                                <li><span>{{ $job->type->translated_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Job -->
                </div>
                @endforeach
            </div>
            <!--/ End Pagination -->
        </div>
    </div>
</section>