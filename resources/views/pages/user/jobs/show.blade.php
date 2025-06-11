@extends('layouts.user.main')

@section('content')

<x-user.breadcrumb :title="__('Job Details')" :description="__('View detailed information about the job, including requirements, salary, and application process')" :page="__('Job Details')" />

<!-- Start Job Details -->
<div class="job-details section">
    <div class="container">
        <div class="row mb-n5">
            <!-- Job List Details Start -->
            <div class="col-lg-8 col-12">
                <div class="job-details-inner">
                    <div class="job-details-head row mx-0">
                        <div class="company-logo col-auto">
                            <div class="job-image">
                                <i class="{{ $job->category->icon }}" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div class="salary-type col-auto order-sm-3">
                            <span class="salary-range">{{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }} {{__('sum')}}</span>
                            <span class="badge badge-success">{{ $job->type->translated_name }}</span>
                        </div>
                        <div class="content col">
                            <h5 class="title">{{ $job->title }}</h5>

                            <ul class="meta">
                                <li><strong class="text-primary"><a href="{{ route('categories.show', $job->category_id) }}">{{ $job->category->translated_name }}</a></strong>
                                </li>
                                <li><i class="lni lni-map-marker"></i><strong class="text-primary">{{ $job->district->translated_name }}</strong></li>
                                <li>{{ $job->address }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="job-details-body">
                        <h6 class="mb-3">{{__('Job Description*')}}</h6>
                        <div class="post-details">
                            <div class="post-image">
                                <div class="row">
                                    @if (!empty($job->job_images) && count($job->job_images) > 0)
                                    @foreach ($job->job_images as $image)
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <button type="button" class="mb-4 border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="{{ asset('storage/jobs/' . $image['image']) }}">
                                            <img src="{{ asset('storage/jobs/' . $image['image']) }}" alt="#" class="img-thumbnail" id="myImg">
                                        </button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p>{{ $job->description }}</p>
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
                                    @if (auth()->check())

                                    @endif
                                    <form action="{{ route('save-jobs.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                                        <button type="submit" class="d-block btn"><i class="fa fa-heart-o mr-1"></i>{{__('Save Job')}}</button>
                                    </form>
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
                                $deadline = Carbon::parse($job->deadline)->format('d.m.Y');
                                $published = Carbon::parse($job->created_at)->format('d.m.Y');
                                @endphp
                                <li><strong>{{__('Published on')}}:</strong> {{ $published }}</li>
                                <li><strong>{{__('Job Type')}}:</strong>{{ $job->type->translated_name }}</li>
                                <li><strong>{{__('District')}}:</strong>{{ $job->district->translated_name }}</li>
                                <li><strong>{{__('Address')}}:</strong>{{ $job->address }}</li>
                                <li><strong>{{__('Salary')}}:</strong>{{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }} {{__('sum') }}</li>
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