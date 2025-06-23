@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Category Jobs')" :description="__('Category Jobs here')" :page="__('Category Jobs list')" />
<section class="find-job job-list section">
    <div class="container">
        <div class="single-head">
            <div class="row">
                @foreach ($jobs as $job)
                <div class="col-lg-6 col-12">
                    <div class="single-job">
                        <div class="job-image">
                            <i class="{{ $job->category->icon }}" style="font-size: 3rem;"></i>
                        </div>
                        <div class="job-content">
                            <h4><a href="{{ route('jobs.show', $job->id) }}">{{ $job->category->translated_name }}</a></h4>
                            <h6><a href="{{ route('jobs.show', $job->id) }}">{{ $job->subcategory->translated_name }}</a></h6>
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
            @if ($jobs->hasPages())
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
@endsection