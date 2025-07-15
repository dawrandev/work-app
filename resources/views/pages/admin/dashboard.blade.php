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
                <h3>Dashboard</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Filter Section -->
    <!-- <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="filter-section">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-select" id="timeFilter">
                                    <option value="today">{{__('Today')}}</option>
                                    <option value="week">{{__('This week')}}</option>
                                    <option value="month" selected>{{__('This month')}}</option>
                                    <option value="year">{{__('This year')}}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="categoryFilter">
                                    <option value="">{{__('All Categories')}}</option>
                                    @foreach(getCategories() as $category)
                                    <option value="{{ $category->id }}">{{ $category->translated_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="districtFilter">
                                    <option value="">{{__('All Districts') }}</option>
                                    @foreach(getDistricts() as $district)
                                    <option value="{{ $district->id }}">{{ $district->translated_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary w-100" id="refreshData">
                                    <i class="icon-filter"></i> Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="m-0">{{__('All users')}}</h6>
                            <h3 class="mb-0 mt-2 text-primary">{{ number_format($stats['total_users']) }}</h3>
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
                            <h3 class="mb-0 mt-2 text-secondary">{{ number_format($stats['total_jobs']) }}</h3>
                            <small class="text-muted">E'lonlar</small>
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
                            <h3 class="mb-0 mt-2 text-success">{{ number_format($stats['total_offers']) }}</h3>
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
                            <h6 class="m-0">{{("Today's")}}</h6>
                            <h3 class="mb-0 mt-2 text-warning">{{ number_format($stats['today_count']) }}</h3>
                            <small class="text-muted">Today's news</small>
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
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart flot-chart-container"></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>1001</h4><span>Purchase </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart1 flot-chart-container"></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>1005</h4><span>Sales</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart2 flot-chart-container"></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>100</h4><span>Sales return</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media border-none align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart3 flot-chart-container"></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>101</h4><span>Purchase ret</span>
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
            <x-admin.charts.monthlyChart :title="'Monthly Data'" :months="$monthlyData['months']" :jobs="$monthlyData['jobs']" :offers="$monthlyData['offers']" />
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