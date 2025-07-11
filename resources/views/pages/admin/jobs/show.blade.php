@extends('layouts.admin.main')

@section('content')
<x-admin.breadcrumb :title="'Job Details'">
    <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">
        <i class="icon-arrow-left"></i>
        Back to Jobs
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <!-- Left Column - Job Info -->
        <div class="col-lg-8">
            <!-- Job Header Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 60px; height: 60px;">
                                <i class="icon-briefcase text-white" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h3 class="mb-1">{{ $job->title }}</h3>
                                <div class="d-flex align-items-center gap-3">
                                    <span class="badge bg-light text-dark">{{ $job->category->name[app()->getLocale()] ?? $job->category->name['uz'] ?? 'N/A' }}</span>
                                    <span class="text-muted">{{ $job->subcategory->name[app()->getLocale()] ?? $job->subcategory->name['uz'] ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <h4 class="text-success mb-0">{{ number_format($job->salary_from) }} - {{ number_format($job->salary_to) }} UZS</h4>
                            <small class="text-muted">Salary Range</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Description Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-file-text text-primary"></i>
                        Job Description
                    </h5>
                </div>
                <div class="card-body">
                    <div class="job-description">
                        {!! $job->description !!}
                    </div>
                </div>
            </div>

            <!-- Location Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-map-pin text-primary"></i>
                        Location
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Job Address</h6>
                            <p class="mb-0">
                                <i class="icon-map-pin text-success me-2"></i>
                                {{ $job->address }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">District</h6>
                            <p class="mb-0">
                                <span class="badge bg-info">{{ $job->district->name[app()->getLocale()] ?? $job->district->name['uz'] ?? 'N/A' }}</span>
                            </p>
                        </div>
                    </div>

                    @if($job->latitude && $job->longitude)
                    <div class="mt-3">
                        <div class="bg-light rounded p-2 text-center">
                            <i class="icon-navigation text-primary"></i>
                            <span class="text-muted">Location: {{ $job->latitude }}, {{ $job->longitude }}</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column - Job Details & Actions -->
        <div class="col-lg-4">
            <!-- Admin Actions Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-settings text-primary"></i>
                        Admin Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($job->approval_status == 'pending')
                        <form method="POST" action="#" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="approval_status" value="approved">
                            <button type="submit" class="btn btn-success w-100 mb-2">
                                <i class="icon-check-circle"></i>
                                Approve Job
                            </button>
                        </form>
                        <form method="POST" action="#" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="approval_status" value="rejected">
                            <button type="submit" class="btn btn-warning w-100 mb-2">
                                <i class="icon-x-circle"></i>
                                Reject Job
                            </button>
                        </form>
                        @elseif($job->approval_status == 'approved')
                        <form method="POST" action="#" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="approval_status" value="rejected">
                            <button type="submit" class="btn btn-warning w-100 mb-2">
                                <i class="icon-x-circle"></i>
                                Reject Job
                            </button>
                        </form>
                        @elseif($job->approval_status == 'rejected')
                        <form method="POST" action="#" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="approval_status" value="approved">
                            <button type="submit" class="btn btn-success w-100 mb-2">
                                <i class="icon-check-circle"></i>
                                Approve Job
                            </button>
                        </form>
                        @endif

                        <hr class="my-2">

                        <form method="POST" action="{{ route('admin.jobs.destroy', $job->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="icon-trash-2"></i>
                                Delete Job
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Job Information Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-info text-primary"></i>
                        Job Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i class="icon-calendar text-info me-2"></i>
                            <small class="text-muted">Published Date</small>
                        </div>
                        <p class="mb-0 fw-medium">{{ $job->created_at->format('d F, Y - H:i') }}</p>
                    </div>

                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i class="icon-clock text-warning me-2"></i>
                            <small class="text-muted">Application Deadline</small>
                        </div>
                        <p class="mb-0 fw-medium">{{ \Carbon\Carbon::parse($job->deadline)->format('d F, Y - H:i') }}</p>
                        @if(\Carbon\Carbon::parse($job->deadline)->isPast())
                        <small class="text-danger"><i class="icon-alert-triangle"></i> Expired</small>
                        @endif
                    </div>

                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i class="icon-briefcase text-primary me-2"></i>
                            <small class="text-muted">Employment Type</small>
                        </div>
                        <p class="mb-0 fw-medium">{{ $job->employmentType->name[app()->getLocale()] ?? $job->employmentType->name['uz'] ?? 'N/A' }}</p>
                    </div>

                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i class="icon-phone text-success me-2"></i>
                            <small class="text-muted">Contact Phone</small>
                        </div>
                        <p class="mb-0 fw-medium">+998 {{ $job->phone }}</p>
                    </div>

                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i class="icon-activity text-info me-2"></i>
                            <small class="text-muted">Job Status</small>
                        </div>
                        <p class="mb-0">
                            @switch($job->status)
                            @case('active')
                            <span class="badge bg-success">Active</span>
                            @break
                            @case('paused')
                            <span class="badge bg-warning">Paused</span>
                            @break
                            @case('closed')
                            <span class="badge bg-secondary">Closed</span>
                            @break
                            @case('expired')
                            <span class="badge bg-danger">Expired</span>
                            @break
                            @case('draft')
                            <span class="badge bg-info">Draft</span>
                            @break
                            @endswitch
                        </p>
                    </div>

                    <div class="info-item">
                        <div class="d-flex align-items-center mb-1">
                            <i class="icon-shield text-warning me-2"></i>
                            <small class="text-muted">Approval Status</small>
                        </div>
                        <p class="mb-0">
                            @switch($job->approval_status)
                            @case('pending')
                            <span class="badge bg-warning">Pending Review</span>
                            @break
                            @case('approved')
                            <span class="badge bg-success">Approved</span>
                            @break
                            @case('rejected')
                            <span class="badge bg-danger">Rejected</span>
                            @break
                            @endswitch
                        </p>
                    </div>
                </div>
            </div>

            <!-- Posted By Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-user text-primary"></i>
                        Posted By
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($job->user->image && $job->user->image != 'user-icon')
                        <img src="{{ asset('storage/users/' . $job->user->image) }}"
                            alt="{{ $job->user->first_name }}"
                            class="rounded-circle shadow"
                            style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                        <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center shadow"
                            style="width: 80px; height: 80px; font-size: 1.5rem;">
                            {{ strtoupper(substr($job->user->first_name, 0, 1)) }}{{ strtoupper(substr($job->user->last_name, 0, 1)) }}
                        </div>
                        @endif
                    </div>

                    <h6 class="mb-1">{{ $job->user->first_name }} {{ $job->user->last_name }}</h6>
                    <p class="text-muted mb-2">
                        <i class="icon-phone me-1"></i>
                        {{ $job->user->phone }}
                    </p>

                    <div class="d-grid">
                        <a href="{{ route('admin.users.show', $job->user->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="icon-eye"></i>
                            View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection