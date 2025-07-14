@extends('layouts.admin.main')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/themify.css')}}">
@endpush

@section('content')
<x-admin.breadcrumb :title="'Offers Management'">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="icon-home"></i>
        Dashboard
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $offers->total() }}</h3>
                            <p class="mb-0">Total Offers</p>
                        </div>
                        <div class="text-white-50">
                            <i class="icon-briefcase" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $offers->where('status', 'active')->count() }}</h3>
                            <p class="mb-0">Active Offers</p>
                        </div>
                        <div class="text-white-50">
                            <i class="icon-check-box" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $offers->where('approval_status', 'pending')->count() }}</h3>
                            <p class="mb-0">Pending Approval</p>
                        </div>
                        <div class="text-white-50">
                            <i class="icon-alarm-clock" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $offers->where('status', 'expired')->count() }}</h3>
                            <p class="mb-0">Expired Offers</p>
                        </div>
                        <div class="text-white-50">
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
            <form method="GET" action="{{ route('admin.offers.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by title or user..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            @foreach(statuses() as $key => $status)
                            <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Approval</label>
                        <select name="approval_status" class="form-select">
                            <option value="">All Approvals</option>
                            @foreach(approvalStatuses() as $value => $label)
                            <option value="{{ $value }}" {{ request('approval_status') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">All Categories</option>
                            @foreach(getCategories() as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name[app()->getLocale()] ?? $category->name['uz'] ?? $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-search"></i> Filter
                            </button>
                            <a href="{{ route('admin.offers.index') }}" class="btn btn-outline-secondary">
                                <i class="icon-refresh-cw"></i> Reset
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Offers Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="icon-list text-primary"></i>
                All Offers
            </h5>
            <div class="d-flex align-items-center">
                <span class="text-muted me-2">Showing {{ $offers->firstItem() ?? 0 }} to {{ $offers->lastItem() ?? 0 }} of {{ $offers->total() }} offers</span>
            </div>
        </div>
        <div class="card-body">
            @if($offers->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Offer Info</th>
                            <th>Category</th>
                            <th>Salary Range</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Approval</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $offer)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 40px; height: 40px;">
                                        <i class="icon-user-check text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ Str::limit($offer->title, 35) }}</h6>
                                        <small class="text-muted">ID: #{{ str_pad($offer->id, 5, '0', STR_PAD_LEFT) }}</small>
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
                                <div>
                                    <h6 class="mb-0">{{ $offer->district->name[app()->getLocale()] ?? $offer->district->name['uz'] ?? 'N/A' }}</h6>
                                    <small class="text-muted">{{ $offer->type->name[app()->getLocale()] ?? $offer->type->name['uz'] ?? 'N/A' }}</small>
                                </div>
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
                                <a href="{{ route('admin.offers.show', $offer->id) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="View Details">
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
                    Showing {{ $offers->firstItem() ?? 0 }} to {{ $offers->lastItem() ?? 0 }} of {{ $offers->total() }} results
                </div>
                <div>
                    {{ $offers->links() }}
                </div>
            </div>
            @else
            <div class="text-center py-5">
                <i class="icon-user-check text-muted" style="font-size: 4rem;"></i>
                <h4 class="text-muted mt-3">No Offers Found</h4>
                <p class="text-muted">No offers match your current filters. Try adjusting your search criteria.</p>
                <a href="{{ route('admin.offers.index') }}" class="btn btn-primary">
                    <i class="icon-refresh-cw"></i> Clear Filters
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection