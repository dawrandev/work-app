@extends('layouts.admin.main')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/chartist.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/date-picker.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/themify.css')}}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>{{__('Dashboard')}}</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Filter Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.dashboard') }}" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <select class="form-control" name="time" onchange="this.form.submit()">
                            <option value="today" {{ request('time') == 'today' ? 'selected' : '' }}>{{__('Today')}}</option>
                            <option value="week" {{ request('time') == 'week' ? 'selected' : '' }}>{{__('This week')}}</option>
                            <option value="month" {{ request('time', 'month') == 'month' ? 'selected' : '' }}>{{__('This month')}}</option>
                            <option value="year" {{ request('time') == 'year' ? 'selected' : '' }}>{{__('This year')}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="category_id" onchange="this.form.submit()">
                            <option value="">{{__('All Categories')}}</option>
                            @foreach(getCategories() as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->translated_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="district_id" onchange="this.form.submit()">
                            <option value="">{{__('All Districts') }}</option>
                            @foreach(getDistricts() as $district)
                            <option value="{{ $district->id }}" {{ request('district_id') == $district->id ? 'selected' : '' }}>
                                {{ $district->translated_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fa fa-filter"></i> {{__('Filter')}}
                        </button>
                    </div>
                    <div class="col-md-1">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary w-100">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="m-0">{{__('All users')}}</h6>
                            <h3 class="mb-0 mt-2 text-primary">{{ number_format($firstCardStats['total_users']) }}</h3>
                            <small class="text-muted">{{__('Registered')}}</small>
                        </div>
                        <div class="text-center">
                            <i data-feather="users" style="font-size: 40px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="m-0">{{__('All Jobs')}}</h6>
                            <h3 class="mb-0 mt-2 text-secondary">{{ number_format($firstCardStats['total_jobs']) }}</h3>
                            <small class="text-muted">{{__('Jobs')}}</small>
                        </div>
                        <div class="text-center">
                            <i data-feather="briefcase" style="font-size: 40px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="m-0">{{__('All Offers')}}</h6>
                            <h3 class="mb-0 mt-2 text-success">{{ number_format($firstCardStats['total_offers']) }}</h3>
                            <small class="text-muted">{{__('Services')}}</small>
                        </div>
                        <div class="text-center">
                            <i data-feather="file-text" style="font-size: 40px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="m-0">{{__("Today's")}}</h6>
                            <h3 class="mb-0 mt-2 text-warning">{{ number_format($firstCardStats['today_count']) }}</h3>
                            <small class="text-muted">{{__("Today's news")}}</small>
                        </div>
                        <div class="text-center">
                            <i data-feather="trending-up" style="font-size: 40px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 xl-100 chart_data_left box-col-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="row m-0 chart-main">
                    <!-- Users Card -->
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart gradient-primary text-center p-3">
                                        <i data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{ number_format($secondCardStats['users']) }}</h4>
                                    <span>{{ __('New Users') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jobs Card -->
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart gradient-secondary text-center p-3">
                                        <i data-feather="briefcase"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{ number_format($secondCardStats['jobs']) }}</h4>
                                    <span>{{ __('Posted Jobs') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Offers Card -->
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart gradient-success text-center p-3">
                                        <i data-feather="file-text"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{ number_format($secondCardStats['offers']) }}</h4>
                                    <span>{{ __('Service Offers') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Applications Card -->
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media border-none align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart gradient-warning text-center p-3">
                                        <i data-feather="send"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{ number_format($secondCardStats['applies']) }}</h4>
                                    <span>{{ __('Applications') }}</span>
                                    <span class="badge badge-success">
                                        {{ $secondCardStats['accepted_applies'] }} {{ __('accepted') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <!-- Monthly Dynamics Chart -->
        <div class="col-xl-12">
            <x-admin.charts.monthlyChart :title="__('Monthly Data')" :months="$monthlyData['months']" :jobs="$monthlyData['jobs']" :offers="$monthlyData['offers']" />
        </div>

        <!-- Category Distribution -->
        <div class=" col-xl-6">
            <x-admin.charts.categoryChart :categoryDistribution="$categoryDistribution" />
        </div>

        <div class=" col-xl-6">
            <x-admin.charts.districtChart :districtDistribution="$districtDistribution" />
        </div>
    </div>
</div>
@endsection

@push('js')

<script src=" {{ asset('assets/admin/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/apex-chart/chart-custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/tooltip-init.js') }}"></script>

@endpush