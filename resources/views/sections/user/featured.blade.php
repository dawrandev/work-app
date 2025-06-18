<section class="featured-job section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">Featured Jobs</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Browse Featured Jobs</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                @foreach (getJobs() as $job)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-job wow fadeInUp" data-wow-delay=".2s">
                        <div class="shape"></div>
                        <div class="feature">{{ $job->category->translated_name }}</div>
                        <div class="image">
                            @if($job->job_images->isNotEmpty())
                            <img src="{{ asset('storage/jobs/' . $job->job_images->first()->image) }}" alt="#">
                            @endif
                        </div>
                        <div class="content">
                            <h4><a href="{{ route('jobs.show', $job->id) }}">{{ $job->subcategory->translated_name }}</a></h4>
                            <ul>
                                <li><i class="lni lni-map-marker"></i>{{ $job->district->translated_name }}</li>
                                <li><i class="lni lni-briefcase"></i>{{ $job->type->translated_name }}</li>
                                <li><i class="lni lni-dollar"></i>{{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }}</li>
                            </ul>
                            <p>{{ $job->title }}</p>
                            <div class="button" style="display: flex; gap: 10px;">
                                <a href="{{ route('jobs.show', $job->id) }}" class="btn">{{ __('Details') }}</a>

                                <form action="{{ route('save-jobs.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                                    <button type="submit" class="btn save">
                                        <i class="lni lni-bookmark"></i> {{ __('Save Job') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>