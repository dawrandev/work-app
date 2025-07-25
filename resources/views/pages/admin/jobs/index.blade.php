@extends('layouts.admin.main')
@section('title', __('All Jobs'))
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/themify.css')}}">
@endpush

@section('content')
<x-admin.breadcrumb :title="__('Jobs Management')">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="icon-home"></i>
        {{__('Dashboard')}}
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-primary text-white shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1 pe-3">
                            <h3 class="mb-2">{{ $jobs->total() }}</h3>
                            <p class="mb-0 lh-sm">{{__('Total Jobs')}}</p>
                        </div>
                        <div class="text-white-50 flex-shrink-0">
                            <i class="icon-briefcase" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-success text-white shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1 pe-3">
                            <h3 class="mb-2">{{ $jobs->where('status', 'active')->count() }}</h3>
                            <p class="mb-0 lh-sm">{{__('Active Jobs')}}</p>
                        </div>
                        <div class="text-white-50 flex-shrink-0">
                            <i class="icon-check-box" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-warning text-white shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1 pe-3">
                            <h3 class="mb-2">{{ $jobs->where('approval_status', 'pending')->count() }}</h3>
                            <p class="mb-0 lh-sm">{{__('Pending Approval')}}</p>
                        </div>
                        <div class="text-white-50 flex-shrink-0">
                            <i class="icon-alarm-clock" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-danger text-white shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1 pe-3">
                            <h3 class="mb-2">{{ $jobs->where('approval_status', 'rejected')->count() }}</h3>
                            <p class="mb-0 lh-sm">{{__('Rejected Jobs')}}</p>
                        </div>
                        <div class="text-white-50 flex-shrink-0">
                            <i class="icon-close" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.jobs.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">{{__('Search')}}</label>
                        <input type="text" name="search" class="form-control" placeholder="{{__('Search by title or user...')}}" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">{{__('Status')}}</label>
                        <select name="status" class="form-select">
                            <option value="">{{__('All Status')}}</option>
                            @foreach(statuses() as $key => $status)
                            <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">{{__('Approval')}}</label>
                        <select name="approval_status" class="form-select">
                            <option value="">{{__('All Approvals')}}</option>
                            @foreach(approvalStatuses() as $value => $label)
                            <option value="{{ $value }}" {{ request('approval_status') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">{{__('Category')}}</label>
                        <select name="category_id" class="form-select">
                            <option value="">{{__('All Categories')}}</option>
                            @foreach(getCategories() as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->translated_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-search"></i> {{__('Filter')}}
                            </button>
                            <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary">
                                <i class="icon-refresh-cw"></i> {{__('Reset')}}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Jobs Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="icon-list text-primary"></i>
                {{__('All Jobs')}}
            </h5>
        </div>
        <div class="card-body">
            @if($jobs->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>{{__('Job Info')}}</th>
                            <th>{{__('Category')}}</th>
                            <th>{{__('Salary Range')}}</th>
                            <th>{{__('Location')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Approval')}}</th>
                            <th>{{__('Created')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 40px; height: 40px;">
                                        <i class="icon-briefcase text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ Str::limit($job->title, 35) }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $job->category->translated_name }}</span>
                                <br>
                                <small class="text-muted">{{ $job->subcategory->translated_name }}</small>
                            </td>
                            <td>
                                <strong class="text-success">{{ number_format($job->salary_from) }}</strong>
                                <span class="text-muted">-</span>
                                <strong class="text-success">{{ number_format($job->salary_to) }}</strong>
                                <small class="text-muted d-block">UZS</small>
                            </td>
                            <td>
                                <div>
                                    <h6 class="mb-0">{{ $job->district->translated_name }}</h6>
                                    <small class="text-muted">{{ $job->type->translated_name }}</small>
                                </div>
                            </td>
                            <td>
                                @switch($job->status)
                                @case('active')
                                <span class="badge bg-success">{{__('Active')}}</span>
                                @break
                                @case('paused')
                                <span class="badge bg-warning">{{__('Paused')}}</span>
                                @break
                                @case('closed')
                                <span class="badge bg-secondary">{{__('Closed')}}</span>
                                @break
                                @case('expired')
                                <span class="badge bg-danger">{{__('Expired')}}</span>
                                @break
                                @case('draft')
                                <span class="badge bg-info">{{__('Draft')}}</span>
                                @break
                                @endswitch
                            </td>
                            <td>
                                @switch($job->approval_status)
                                @case('pending')
                                <span class="badge bg-warning">{{__('Pending')}}</span>
                                @break
                                @case('approved')
                                <span class="badge bg-success">{{__('Approved')}}</span>
                                @break
                                @case('rejected')
                                <span class="badge bg-danger">{{__('Rejected')}}</span>
                                @break
                                @endswitch
                            </td>
                            <td>
                                <span class="fw-medium">{{ $job->created_at->format('d/m/Y') }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.jobs.show', $job->id) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="{{__('View Details')}}">
                                    <i class="icon-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    {{__('Showing')}} {{ $jobs->firstItem() ?? 0 }} {{__('to')}} {{ $jobs->lastItem() ?? 0 }} {{__('of')}} {{ $jobs->total() }} {{__('results')}}
                </div>
                <div>
                    {{ $jobs->links() }}
                </div>
            </div>
            @else
            <div class="text-center py-5">
                <i class="icon-briefcase text-muted" style="font-size: 4rem;"></i>
                <h4 class="text-muted mt-3">{{__('No Jobs Found')}}</h4>
                <p class="text-muted">{{__('No jobs match your current filters. Try adjusting your search criteria.')}}</p>
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-primary">
                    <i class="icon-refresh-cw"></i> {{__('Clear Filters')}}
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon-clipart.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
@endpush