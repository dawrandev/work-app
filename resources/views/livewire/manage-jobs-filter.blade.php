@php
$sectionClass = 'manage-jobs';
@endphp
@extends('pages.user.profile.index')

@section('profile-content')
<div class="row">
    <div class="col-12">
        <!-- Page Header with Button -->
        <div class="page-header-content mb-4">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <h3 class="page-title">{{ __('Manage Jobs') }}</h3>
                    <p class="text-muted mb-0">{{ __('Manage your job postings') }}</p>
                </div>
                <div class="col-sm-4 text-sm-end">
                    <a href="{{ route('jobs.create') }}" class="btn btn-light">
                        <i class="lni lni-plus"></i> {{ __('Post New Job') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="job-filter-wrap bg-light rounded p-3 mb-4">
            <form method="GET" action="{{ route('profile.manage-jobs') }}" id="filterForm">
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text"
                                name="search"
                                class="form-control"
                                placeholder="{{ __('Search by job title...') }}"
                                value="{{ request('search') }}"
                                onkeyup="submitFormDelayed()">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="category" class="form-control" onchange="this.form.submit()">
                                <option value="">{{ __('All Categories') }}</option>
                                @foreach($categories ?? [] as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->translated_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="district" class="form-control" onchange="this.form.submit()">
                                <option value="">{{ __('All Districts') }}</option>
                                @foreach($districts ?? [] as $district)
                                <option value="{{ $district->id }}" {{ request('district') == $district->id ? 'selected' : '' }}>
                                    {{ $district->translated_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="">{{ __('All Status') }}</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>{{ __('Expired') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Jobs Table -->
        <div class="job-items bg-white shadow-sm rounded">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="5%" class="text-center">#</th>
                            <th width="25%">{{ __('Job Title') }}</th>
                            <th width="15%">{{ __('Category') }}</th>
                            <th width="15%">{{ __('Location') }}</th>
                            <th width="10%">{{ __('Type') }}</th>
                            <th width="10%" class="text-center">{{ __('Status') }}</th>
                            <th width="10%" class="text-center">{{ __('Posted') }}</th>
                            <th width="10%" class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                        <tr>
                            <td class="text-center">
                                <span class="text-muted">{{ ($jobs->currentPage() - 1) * $jobs->perPage() + $loop->iteration }}</span>
                            </td>
                            <td>
                                <div class="job-title-wrap">
                                    <h6 class="mb-1">
                                        <a href="{{ route('jobs.show', $job->id) }}" class="text-dark text-decoration-none">
                                            {{ $job->title }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        <i class="lni lni-eye"></i> {{ $job->views ?? 0 }} views •
                                        <i class="lni lni-users"></i> {{ $job->applications_count ?? 0 }} applicants
                                    </small>
                                </div>
                            </td>
                            <td>
                                <span class="badge" style="background-color: #0ea5e9; color: white;">{{ $job->category->translated_name }}</span>
                            </td>
                            <td>
                                <span class="text-muted">
                                    <i class="lni lni-map-marker"></i> {{ $job->district->translated_name }}
                                </span>
                            </td>
                            <td>
                                @if($job->type->slug == 'full-time')
                                <span class="badge" style="background-color: #10b981; color: white;">{{ $job->type->translated_name }}</span>
                                @elseif($job->type->slug == 'part-time')
                                <span class="badge" style="background-color: #f59e0b; color: white;">{{ $job->type->translated_name }}</span>
                                @elseif($job->type->slug == 'contract')
                                <span class="badge" style="background-color: #8b5cf6; color: white;">{{ $job->type->translated_name }}</span>
                                @elseif($job->type->slug == 'freelance')
                                <span class="badge" style="background-color: #3b82f6; color: white;">{{ $job->type->translated_name }}</span>
                                @else
                                <span class="badge" style="background-color: #6b7280; color: white;">{{ $job->type->translated_name }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($job->status == 'active')
                                <span class="badge" style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-checkmark-circle"></i> {{ __('Active') }}
                                </span>
                                @elseif($job->status == 'inactive')
                                <span class="badge" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-close"></i> {{ __('Inactive') }}
                                </span>
                                @elseif($job->status == 'pending')
                                <span class="badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-timer"></i> {{ __('Pending') }}
                                </span>
                                @else
                                <span class="badge" style="background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-ban"></i> {{ __('Expired') }}
                                </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <small class="text-muted">{{ $job->created_at->format('d M, Y') }}</small>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('jobs.show', $job->id) }}"
                                        class="btn btn-outline-primary"
                                        title="{{ __('View') }}">
                                        <i class="lni lni-eye"></i>
                                    </a>
                                    <a href="{{ route('jobs.edit', $job->id) }}"
                                        class="btn btn-outline-warning"
                                        title="{{ __('Edit') }}">
                                        <i class="lni lni-pencil"></i>
                                    </a>
                                    <button type="button"
                                        class="btn btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $job->id }}"
                                        title="{{ __('Delete') }}">
                                        <i class="lni lni-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $job->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ __('Delete Job') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ __('Are you sure you want to delete this job?') }}</p>
                                        <p class="text-muted mb-0"><strong>{{ $job->title }}</strong></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            {{ __('Cancel') }}
                                        </button>
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="empty-content">
                                    <i class="lni lni-briefcase" style="font-size: 3rem; color: #dee2e6;"></i>
                                    <p class="mt-3 mb-1">{{ __('No jobs found') }}</p>
                                    <p class="text-muted mb-4">{{ __('Start by posting your first job.') }}</p>
                                    <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                                        <i class="lni lni-plus"></i> {{ __('Post New Job') }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if ($jobs->hasPages())
        <div class="pagination-wrapper mt-4">
            {{ $jobs->links() }}
        </div>
        @endif

        <script>
            let searchTimer;

            function submitFormDelayed() {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(function() {
                    document.getElementById('filterForm').submit();
                }, 300);
            }
        </script>
    </div>
</div>

<style>
    /* Page specific styles that don't conflict with template */
    .manage-jobs .page-header-content {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }

    .manage-jobs .page-header-content .page-title {
        color: white;
        font-size: 1.75rem;
        font-weight: 700;
    }

    .manage-jobs .page-header-content .text-muted {
        color: rgba(255, 255, 255, 0.8) !important;
    }

    .manage-jobs .job-filter-wrap {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .manage-jobs .job-items {
        border: none;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    .manage-jobs .job-title-wrap h6 {
        font-size: 1rem;
        font-weight: 600;
        color: #2d3748;
    }

    .manage-jobs .job-title-wrap a:hover {
        color: #667eea !important;
    }

    .manage-jobs .table thead {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .manage-jobs .table thead th {
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #4a5568;
        padding: 1.25rem 1rem;
        border-bottom: 3px solid #667eea;
    }

    .manage-jobs .table tbody tr {
        border-bottom: 1px solid #f1f3f5;
        transition: all 0.3s ease;
    }

    .manage-jobs .table tbody tr:hover {
        background-color: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .manage-jobs .table tbody td {
        padding: 1.25rem 1rem;
        vertical-align: middle;
    }

    .manage-jobs .empty-content {
        padding: 3rem;
    }

    .manage-jobs .btn-group-sm>.btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 6px;
        margin: 0 2px;
        transition: all 0.3s ease;
    }

    .manage-jobs .btn-outline-primary:hover {
        background-color: #667eea;
        border-color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
    }

    .manage-jobs .btn-outline-warning:hover {
        background-color: #f59e0b;
        border-color: #f59e0b;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(245, 158, 11, 0.3);
    }

    .manage-jobs .btn-outline-danger:hover {
        background-color: #ef4444;
        border-color: #ef4444;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
    }

    /* Badge styles */
    .manage-jobs .badge {
        font-weight: 600;
        padding: 0.5em 0.85em;
        border-radius: 6px;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Location style */
    .manage-jobs .text-muted i {
        color: #667eea;
    }

    /* Make table responsive on mobile */
    @media (max-width: 768px) {
        .manage-jobs .page-header-content {
            padding: 1.5rem;
            text-align: center;
        }

        .manage-jobs .table {
            font-size: 0.875rem;
        }

        .manage-jobs .table thead th,
        .manage-jobs .table tbody td {
            padding: 0.75rem 0.5rem;
        }

        .manage-jobs .job-title-wrap h6 {
            font-size: 0.875rem;
        }

        .manage-jobs .job-title-wrap small {
            font-size: 0.75rem;
        }
    }

    /* Filter form improvements */
    .manage-jobs .form-control,
    .manage-jobs .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .manage-jobs .form-control:focus,
    .manage-jobs .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    /* Button improvements */
    .manage-jobs .btn-light {
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .manage-jobs .btn-light:hover {
        background: white;
        color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .manage-jobs .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .manage-jobs .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    /* Modal improvements */
    .manage-jobs .modal-content {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .manage-jobs .modal-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px 12px 0 0;
        border-bottom: 2px solid #667eea;
    }

    /* Pagination improvements */
    .manage-jobs .page-link {
        color: #667eea;
        border: 1px solid #e9ecef;
        margin: 0 3px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .manage-jobs .page-link:hover {
        background-color: #667eea;
        border-color: #667eea;
        color: white;
        transform: translateY(-2px);
    }

    .manage-jobs .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: transparent;
        box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
    }

    /* Animation for table rows */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .manage-jobs tbody tr {
        animation: fadeIn 0.3s ease-out;
    }
</style>
@endsection