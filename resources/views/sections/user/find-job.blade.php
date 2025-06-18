<section class="find-job section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">Hot Jobs</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Browse Recent Jobs</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
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
                            <h4><a href="{{ route('jobs.show', $job->id) }}">{{ $job->category->translated_name }}</a> <br><a href="{{ route('jobs.show', $job->id) }}">{{ $job->subcategory->translated_name }}</a></h4>
                            <p>{{ $job->title }}</p>
                            <ul>
                                <li></i>{{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }} sum</li>
                                <li><i class="lni lni-map-marker"></i>{{ $job->district->translated_name }}</li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                <li><a href="{{ route('jobs.show', ['job' => $job->id]) }}">{{__('Details') }}</a></li>
                                <li><span>{{ $job->type->translated_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Job -->
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            @if (getJobs()->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            @if ($jobs->onFirstPage())
                            <li class="disabled"><span><i class="lni lni-arrow-left"></i></span></li>
                            @else
                            <li><a href="{{ $jobs->previousPageUrl() }}"><i class="lni lni-arrow-left"></i></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                            @if ($page == $jobs->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                            @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($jobs->hasMorePages())
                            <li><a href="{{ $jobs->nextPageUrl() }}"><i class="lni lni-arrow-right"></i></a></li>
                            @else
                            <li class="disabled"><span><i class="lni lni-arrow-right"></i></span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <!--/ End Pagination -->
        </div>
    </div>
</section>