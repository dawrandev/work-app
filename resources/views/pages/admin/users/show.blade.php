@extends('layouts.admin.main')

@section('content')
<x-admin.breadcrumb :title="'User Details'">
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
        <i class="icon-arrow-left"></i>
        Back to List
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="mb-4">
                        @if($user->image && $user->image != 'user-icon')
                        <img src="{{ asset('storage/users/' . $user->image) }}"
                            alt="{{ $user->first_name }}"
                            class="rounded-circle shadow"
                            style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center shadow"
                            style="width: 150px; height: 150px; font-size: 3rem;">
                            {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                        </div>
                        @endif
                    </div>

                    <h4 class="mb-1">{{ $user->first_name }} {{ $user->last_name }}</h4>

                    <div class="mb-3">
                        @if($user->role == 'admin')
                        <span class="badge bg-danger fs-6">Administrator</span>
                        @else
                        <span class="badge bg-success fs-6">User</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-info text-primary"></i>
                        User Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">{{ $user->first_name }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">{{ $user->last_name }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">Phone Number</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">
                                <i class="icon-phone text-success me-1"></i>
                                +998 {{ $user->phone }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">User Role</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0">
                                @if($user->role == 'admin')
                                <span class="badge bg-danger">Administrator</span>
                                @else
                                <span class="badge bg-success">User</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">Account Created</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">
                                <i class="icon-calendar text-info me-1"></i>
                                {{ $user->created_at->format('d F, Y - H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Jobs Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="icon-briefcase text-primary"></i>
                        User Jobs
                    </h5>
                    <span class="badge bg-primary">{{ $user->jobs->count() }} Jobs</span>
                </div>
                <div class="card-body">
                    @if($user->jobs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Salary Range</th>
                                    <th>Status</th>
                                    <th>Approval</th>
                                    <th>Deadline</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->jobs as $job)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 35px; height: 35px;">
                                                <i class="icon-briefcase text-white"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ Str::limit($job->title, 30) }}</h6>
                                                <small class="text-muted">{{ $job->district->name[app()->getLocale()] ?? $job->district->name['uz'] ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $job->category->name[app()->getLocale()] ?? $job->category->name['uz'] ?? 'N/A' }}</span>
                                        <br>
                                        <small class="text-muted">{{ $job->subcategory->name[app()->getLocale()] ?? $job->subcategory->name['uz'] ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        <strong class="text-success">{{ number_format($job->salary_from) }}</strong>
                                        <span class="text-muted">-</span>
                                        <strong class="text-success">{{ number_format($job->salary_to) }}</strong>
                                        <small class="text-muted d-block">UZS</small>
                                    </td>
                                    <td>
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
                                    </td>
                                    <td>
                                        @switch($job->approval_status)
                                        @case('pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @break
                                        @case('approved')
                                        <span class="badge bg-success">Approved</span>
                                        @break
                                        @case('rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                        @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <span class="fw-medium">{{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}</span>
                                        <small class="text-muted d-block">{{ \Carbon\Carbon::parse($job->deadline)->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.jobs.show', $job->id) }}"
                                                class="btn btn-sm btn-outline-primary"
                                                title="View Details">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="icon-briefcase text-muted" style="font-size: 3rem;"></i>
                        <h5 class="text-muted mt-2">No Jobs Found</h5>
                        <p class="text-muted">This user hasn't posted any jobs yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- User Offers Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="icon-user-check text-success"></i>
                        User Service Offers
                    </h5>
                    <span class="badge bg-success">{{ $user->offers->count() }} Offers</span>
                </div>
                <div class="card-body">
                    @if($user->offers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Salary Range</th>
                                    <th>Status</th>
                                    <th>Approval</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->offers as $offer)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 35px; height: 35px;">
                                                <i class="icon-user-check text-white"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ Str::limit($offer->title, 30) }}</h6>
                                                <small class="text-muted">{{ $offer->district->name[app()->getLocale()] ?? $offer->district->name['uz'] ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $offer->category->name[app()->getLocale()] ?? $offer->category->name['uz'] ?? 'N/A' }}</span>
                                        <br>
                                        <small class="text-muted">{{ $offer->subcategory->name[app()->getLocale()] ?? $offer->subcategory->name['uz'] ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        <strong class="text-success">{{ number_format($offer->salary_from) }}</strong>
                                        <span class="text-muted">-</span>
                                        <strong class="text-success">{{ number_format($offer->salary_to) }}</strong>
                                        <small class="text-muted d-block">UZS</small>
                                    </td>
                                    <td>
                                        @switch($offer->status)
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
                                    </td>
                                    <td>
                                        @switch($offer->approval_status)
                                        @case('pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @break
                                        @case('approved')
                                        <span class="badge bg-success">Approved</span>
                                        @break
                                        @case('rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                        @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <span class="fw-medium">{{ $offer->created_at->format('d M, Y') }}</span>
                                        <small class="text-muted d-block">{{ $offer->created_at->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.offers.show', $offer->id) }}"
                                                class="btn btn-sm btn-outline-primary"
                                                title="View Details">
                                                <i class="icon-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.offers.edit', $offer->id) }}"
                                                class="btn btn-sm btn-outline-warning"
                                                title="Edit">
                                                <i class="icon-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="icon-user-check text-muted" style="font-size: 3rem;"></i>
                        <h5 class="text-muted mt-2">No Service Offers Found</h5>
                        <p class="text-muted">This user hasn't created any service offers yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection