@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Category Jobs')" :description="__('Category Jobs here')" :page="__('Category Jobs list')" />
<section class="find-job job-list section">
    <div class="container">
        <div class="single-head">
            <div class="row">
                @foreach ($jobs->jobs as $job)
                <div class="col-lg-6 col-12">
                    <div class="single-job">
                        <div class="job-image">
                            <i class="{{ $category->icon }}" style="font-size: 3rem;"></i>
                        </div>
                        <div class="job-content">
                            <h4><a href="{{ route('jobs.show', $job->id) }}">{{ $job->category->translated_name }}</a></h4>
                            <p>{{ $job->title }}</p>
                            <ul>
                                <li><i class=" lni lni-dollar"></i>{{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }}</li>
                                <li><i class="lni lni-map-marker"></i>{{ $job->district->translated_name }}</li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                <li><a href="{{ route('jobs.show', $job->id) }}">{{ __('Details') }}</a></li>
                                <li><span>{{ $job->type->translated_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class=" row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            <li><a href="#"><i class="lni lni-arrow-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="lni lni-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ End Pagination -->
        </div>
    </div>
</section>
@endsection