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

    <!-- Jobs Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="icon-list text-primary"></i>
                {{__('All Jobs')}}
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @livewire('tables.admin.jobs-table')
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon-clipart.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
@endpush