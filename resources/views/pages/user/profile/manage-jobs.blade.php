@php
$sectionClass = 'manage-jobs';
@endphp
@extends('pages.user.profile.index')

@section('profile-content')
<div class="col-lg-8 col-12">
    <div class="job-items shadow rounded bg-white p-4 mb-4">
        <!-- Table Header -->
        <div class="manage-list border-bottom pb-2 mb-3">
            <div class="row text-center font-weight-bold text-secondary">
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('Category*') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('District') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('Title*') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('Job Type') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('Action') }}</p>
                </div>
            </div>
        </div>
        <!-- Table Rows -->
        @forelse ($jobs as $job)
        <div class="manage-content border-bottom py-3">
            <div class="row align-items-center text-center">
                <div class="col-lg-2 col-md-2 col-12">
                    <h3>{{ $job->category->translated_name }}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <span class="text-dark">{{ $job->district->translated_name }}</span>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <span class="font-weight-bold">{{ $job->title }}</span>
                </div>
                <div class="col-lg-1 col-md-1 col-12">
                    <p><span class="time">{{ $job->type->translated_name }}</span></p>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="d-flex justify-content-center flex-wrap gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm" title="{{ __('View') }}">
                            <i class="lni lni-eye"></i>
                        </a>
                        <a href="#" class="btn btn-outline-warning btn-sm" title="{{ __('Edit') }}">
                            <i class="lni lni-pencil"></i>
                        </a>
                        <form action="#" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this job?') }}')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="{{ __('Delete') }}">
                                <i class="lni lni-trash-can"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @empty
        <div class="text-center text-muted py-5">
            <i class="lni lni-briefcase" style="font-size:2rem;"></i>
            <p class="mt-2">{{ __('No jobs found.') }}</p>
        </div>
        @endforelse
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