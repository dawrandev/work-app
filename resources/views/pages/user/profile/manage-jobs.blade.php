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

        <!-- Livewire Filter Component -->
        @livewire('manage-jobs-filter')
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