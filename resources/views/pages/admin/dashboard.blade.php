@extends('layouts.admin.main')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/themify.css')}}">
@endsection

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
    <div class="card shadow-sm mb-4">
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
    </div>

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
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5>Oylik dinamika</h5>
                    <div class="card-header-right-icon">
                    </div>
                </div>
                <div class="card-body apex-chart">
                    <div id="area-spaline"></div>
                </div>
            </div>
        </div>

        <!-- Category Distribution -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5>Kategoriyalar bo'yicha</h5>
                </div>
                <div class="card-body">
                    <div class="loader-box">
                        <div class="loader-3"></div>
                    </div>
                    <div id="categoryChart"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Distribution Charts Row -->
    <div class="row">
        <!-- District Distribution -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5>Tumanlar bo'yicha (Top 10)</h5>
                </div>
                <div class="card-body">
                    <div class="loader-box">
                        <div class="loader-3"></div>
                    </div>
                    <div id="districtChart"></div>
                </div>
            </div>
        </div>

        <!-- Employment Type Distribution -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5>Ish turlari bo'yicha</h5>
                </div>
                <div class="card-body">
                    <div class="loader-box">
                        <div class="loader-3"></div>
                    </div>
                    <div id="employmentChart"></div>
                </div>
            </div>
        </div>

        <!-- Status Distribution -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5>Holat bo'yicha</h5>
                </div>
                <div class="card-body">
                    <div class="loader-box">
                        <div class="loader-3"></div>
                    </div>
                    <div id="statusChart"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Row -->
    <div class="row">
        <!-- Recent Jobs -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5>So'nggi qo'shilgan ishlar</h5>
                    <div class="card-header-right-icon">
                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-link btn-sm">
                            Barchasi <i data-feather="arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sarlavha</th>
                                    <th>Kategoriya</th>
                                    <th>Tuman</th>
                                    <th>Maosh</th>
                                    <th>Holat</th>
                                    <th>Amallar</th>
                                </tr>
                            </thead>
                            <tbody id="jobsTableBody">
                                @forelse($recentJobs as $job)
                                <tr>
                                    <td>{{ $job['id'] }}</td>
                                    <td>{{ Str::limit($job['title'], 25) }}</td>
                                    <td>{{ $job['category'] }}</td>
                                    <td>{{ $job['district'] }}</td>
                                    <td>{{ $job['salary'] }}</td>
                                    <td>
                                        <span class="badge badge-{{ $job['status'] == 'active' ? 'success' : 'secondary' }} badge-status">
                                            {{ $job['status'] }}
                                        </span>
                                    </td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.jobs.show', $job['id']) }}" class="btn btn-primary btn-sm" title="Ko'rish">
                                            <i class="icon-eye"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm delete-job" data-id="{{ $job['id'] }}" title="O'chirish">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Ma'lumot topilmadi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Offers -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5>So'nggi qo'shilgan takliflar</h5>
                    <div class="card-header-right-icon">
                        <a href="{{ route('admin.offers.index') }}" class="btn btn-link btn-sm">
                            Barchasi <i data-feather="arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sarlavha</th>
                                    <th>Kategoriya</th>
                                    <th>Tuman</th>
                                    <th>Narx</th>
                                    <th>Holat</th>
                                    <th>Amallar</th>
                                </tr>
                            </thead>
                            <tbody id="offersTableBody">
                                @forelse($recentOffers as $offer)
                                <tr>
                                    <td>{{ $offer['id'] }}</td>
                                    <td>{{ Str::limit($offer['title'], 25) }}</td>
                                    <td>{{ $offer['category'] }}</td>
                                    <td>{{ $offer['district'] }}</td>
                                    <td>{{ $offer['salary'] }}</td>
                                    <td>
                                        <span class="badge badge-{{ $offer['status'] == 'active' ? 'success' : 'secondary' }} badge-status">
                                            {{ $offer['status'] }}
                                        </span>
                                    </td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.offers.show', $offer['id']) }}" class="btn btn-primary btn-sm" title="Ko'rish">
                                            <i class="icon-eye"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm delete-offer" data-id="{{ $offer['id'] }}" title="O'chirish">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Ma'lumot topilmadi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/admin/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/apex-chart/chart-custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/tooltip-init.js') }}"></script>

<script>
    // donut chart
    var options9 = {
        chart: {
            width: 380,
            type: 'donut',
        },
        series: [44, 55, 41, 17, 15],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        colors: ['#dc3545', '#f8d62b', CubaAdminConfig.primary, '#51bb25', '#a927f9']
    }

    var chart9 = new ApexCharts(
        document.querySelector("#donutchart"),
        options9
    );

    chart9.render();

    // area spaline chart
    var options1 = {
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        series: [{
            name: 'series1',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'series2',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],

        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        colors: [CubaAdminConfig.primary, CubaAdminConfig.secondary]
    }

    var chart1 = new ApexCharts(
        document.querySelector("#area-spaline"),
        options1
    );
</script>

@endsection