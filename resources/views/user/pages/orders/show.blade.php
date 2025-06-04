@extends('user.layouts.main')

@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{__('Job Details')}}</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="index-2.html">{{__('Home')}}</a></li>
                    <li>{{__('Job Details')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Start Job Details -->
<div class="job-details section">
    <div class="container">
        <div class="row mb-n5">
            <!-- Job List Details Start -->
            <div class="col-lg-8 col-12">
                <div class="job-details-inner">
                    <div class="job-details-head row mx-0">
                        <div class="company-logo col-auto">
                            <a href="#" style="border-radius: 4px; overflow: hidden;"><img src="{{ asset('assets/images/universal-image/job-details.png') }}"
                                    alt="Company Logo"></a>
                        </div>
                        <div class="salary-type col-auto order-sm-3">
                            <span class="salary-range">{{ number_format($order->salary_from, 0, ',', ' ') }} - {{ number_format($order->salary_to, 0, ',', ' ') }} {{__('sum')}}</span>
                            <span class="badge badge-success">{{ $order->type->translated_name }}</span>
                        </div>
                        <div class="content col">
                            <h5 class="title">{{ $order->title }}</h5>
                            <ul class="meta">
                                <li><strong class="text-primary"><a href="#">{{ $order->category->translated_name }}</a></strong>
                                </li>
                                <li><i class="lni lni-map-marker"></i><strong class="text-primary">{{ $order->district->translated_name }}</strong></li>
                                <li>{{ $order->address }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="job-details-body">
                        <h6 class="mb-3">{{__('Job Description*')}}</h6>
                        <p>{{ $order->description }}</p>
                    </div>
                </div>
            </div>
            <!-- Job List Details End -->
            <!-- Job Sidebar Wrap Start -->
            <div class="col-lg-4 col-12">
                <div class="job-details-sidebar">
                    <!-- Sidebar (Apply Buttons) Start -->
                    <div class="sidebar-widget">
                        <div class="inner">
                            <div class="row m-n2 button">
                                <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-1">
                                    <a href="bookmarked.html" class="d-block btn"><i class="fa fa-heart-o mr-1"></i>{{__('Save Job')}}</a>
                                </div>
                                <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-1">
                                    <a href="job-details.html" class="d-block btn btn-alt">{{__('Apply')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar (Apply Buttons) End -->
                    <!-- Sidebar (Job Overview) Start -->
                    <div class="sidebar-widget">
                        <div class="inner">
                            <h6 class="title">{{__('Job Overview')}}</h6>
                            <ul class="job-overview list-unstyled">
                                @php
                                use Carbon\Carbon;
                                $deadline = Carbon::parse($order->deadline)->format('d.m.Y');
                                $published = Carbon::parse($order->created_at)->format('d.m.Y');
                                @endphp
                                <li><strong>{{__('Published on')}}:</strong> {{ $published }}</li>
                                <li><strong>{{__('Job Type')}}:</strong>{{ $order->type->translated_name }}</li>
                                <li><strong>{{__('District')}}:</strong>{{ $order->district->translated_name }}</li>
                                <li><strong>{{__('Address')}}:</strong>{{ $order->address }}</li>
                                <li><strong>{{__('Salary')}}:</strong>{{ number_format($order->salary_from, 0, ',', ' ') }} - {{ number_format($order->salary_to, 0, ',', ' ') }} {{__('sum') }}</li>
                                <li><strong>{{__('Deadline')}}:</strong>{{ $deadline }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar (Job Overview) End -->
                </div>
            </div>
            <!-- Job Sidebar Wrap End -->
        </div>
    </div>
</div>
<!-- End Job Details -->
@endsection