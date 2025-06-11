@php
$sectionClass = 'bookmarked';
@endphp

@extends('pages.user.profile.index')

@section('profile-content')
<div class="col-lg-8 col-12">
    <div class="job-items">
        @foreach ($jobs as $job)
        <div class="manage-content">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="title-img">
                        <div class="can-img">
                            <i class="{{ $job->category->icon }}" style="font-size: 3rem;"></i>
                        </div>
                        <h3>{{ $job->category->translated_name }} <span>{{ $job->title }}</span></h3>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p><span class="time">{{ $job->type->translated_name }}</span></p>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <p class="location"><i class="lni lni-map-marker"></i> {{ $job->district->translated_name }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="button">
                        <a href="{{ route('jobs.show', $job->id) }}" class="btn">{{__('Apply')}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    @if ($jobs->hasPages())
    <div class="pagination left pagination-md-center">
        <ul class="pagination-list">
            @if ($jobs->onFirstPage())
            <li class="disabled"><span><i class="lni lni-arrow-left"></i></span></li>
            @else
            <li><a href="{{ $jobs->previousPageUrl() }}"><i class="lni lni-arrow-left"></i></a></li>
            @endif

            @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
            @if ($page == $jobs->currentPage())
            <li class="active"><a href="#">{{ $page }}</a></li>
            @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach

            @if ($jobs->hasMorePages())
            <li><a href="{{ $jobs->nextPageUrl() }}"><i class="lni lni-arrow-right"></i></a></li>
            @else
            <li class="disabled"><span><i class="lni lni-arrow-right"></i></span></li>
            @endif
        </ul>
    </div>
    @endif
    <!-- End Pagination -->
</div>
@endsection