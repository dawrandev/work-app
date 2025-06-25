@php
$sectionClass = 'manage-jobs';
@endphp
@extends('pages.user.profile.index')

@section('profile-content')
<div class="col-lg-8 col-12">
    <!-- Job Count -->
    <div class="job-items shadow rounded bg-white p-4 mb-4">
        <!-- Table Header -->
        <div class="manage-list border-bottom pb-2 mb-3">
            <div class="row text-center font-weight-bold text-secondary">
                <div class="col-lg-1 col-md-1 col-12">
                    <p class="mb-0">{{ __('№') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('Category*') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('District') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('Job title*') }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="mb-0">{{ __('Job Type') }}</p>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <p class="mb-0">{{ __('Actions') }}</p>
                </div>
            </div>
        </div>
        @php
        $i = 1;
        @endphp
        <!-- Table Rows -->
        @forelse ($jobs as $job)
        <div class="manage-content border-bottom py-3">
            <div class="row align-items-center text-center">
                <div class="col-lg-1 col-md-1 col-2">
                    <h3>{{ $i++ }}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-4">
                    <h6 class="mb-0">{{ $job->category->translated_name }}</h6>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <span class="text-dark">{{ $job->district->translated_name }}</span>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <span class="font-weight-bold">{{ $job->title }}</span>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <p class="mb-0"><span class="time">{{ $job->type->translated_name }}</span></p>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-outline-primary btn-sm mx-1" title="{{ __('View') }}">
                            <i class="lni lni-eye"></i>
                        </a>
                        <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-outline-warning btn-sm mx-1" title="{{ __('Edit') }}">
                            <i class="lni lni-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-outline-danger btn-sm mx-1 delete-job-btn" title="{{ __('Delete') }}" data-toggle="modal" data-target="#deleteJobModal{{ $job->id }}">
                            <i class="lni lni-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteJobModal{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteJobModalLabel{{ $job->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteJobModalLabel{{ $job->id }}">{{ __('Confirm Delete') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('Are you sure you want to delete this job?') }} <strong>{{ $job->title }}</strong>? {{ __('This action cannot be undone.') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
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