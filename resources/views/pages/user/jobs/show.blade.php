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
                            @if($job->salary_from || $job->salary_to)
                            <span class="salary-range">
                                @if($job->salary_from && $job->salary_to)
                                {{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }} {{__('sum')}}
                                @elseif($job->salary_from)
                                {{ __('From') }} {{ number_format($job->salary_from, 0, ',', ' ') }} {{__('sum')}}
                                @else
                                {{ __('Up to') }} {{ number_format($job->salary_to, 0, ',', ' ') }} {{__('sum')}}
                                @endif
                            </span>
                            @else
                            <span class="salary-range">{{ __('Negotiable') }}</span>
                            @endif
                            <div class="job-badges mt-2">
                                <span class="badge badge-success">{{ $job->type->translated_name }}</span>
                                @if($job->employmentType)
                                <span class="badge badge-employment">
                                    <i class="lni lni-users"></i>
                                    {{ $job->employmentType->translated_name }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="content col">
                            <h5 class="title">{{ $job->title }}</h5>
                            <ul class="meta">
                                <li><strong class="text-primary"><a href="{{ route('categories.show', $job->category_id) }}">{{ $job->category->translated_name }}</a></strong></li>
                                <li><strong class="text-primary"><a href="{{ route('subcategories.show', $job->subcategory_id) }}">{{ $job->subcategory->translated_name }}</a></strong></li>
                            </ul>
                        </div>
                    </div>

                    <div class="job-details-body">
                        <!-- Job Description -->
                        <h6 class="mb-3">{{__('Job Description')}}</h6>
                        <p>{{ $job->description }}</p>

                        <!-- Images Gallery -->
                        @if (!empty($job->images) && count($job->images) > 0)
                        <div class="post-details mt-4">
                            <h6 class="mb-3">{{__('Images')}}</h6>
                            <div class="post-image">
                                <div class="row">
                                    @foreach ($job->images as $index => $image)
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="image-wrapper mb-3">
                                            <img src="{{ asset('storage/jobs/' . $image['image_path']) }}"
                                                alt="Job image {{ $index + 1 }}"
                                                class="img-thumbnail job-image-thumb"
                                                style="cursor: pointer; height: 150px; width: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Location Map -->
                        @if($job->latitude && $job->longitude)
                        <div class="job-location mt-4">
                            <h6 class="mb-3">{{__('Location')}}</h6>

                            <!-- Address Block -->
                            @if($job->address)
                            <div class="address-block mb-3">
                                <div class="address-content">
                                    <div class="address-icon">
                                        <i class="lni lni-map-marker"></i>
                                    </div>
                                    <div class="address-text">
                                        <h6 class="address-title">{{ __('Job Address') }}</h6>
                                        <p class="address-detail">{{ $job->address }}</p>
                                        @if($job->district)
                                        <span class="district-badge">
                                            <i class="lni lni-map"></i>
                                            {{ $job->district->translated_name }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="map-container">
                                <div id="jobMap"
                                    data-lat="{{ $job->latitude }}"
                                    data-lng="{{ $job->longitude }}"
                                    data-title="{{ str_replace('"', '&quot;', $job->title) }}"
                                    data-address="{{ str_replace('"', '&quot;', $job->address) }}"
                                    data-phone="{{ $job->phone }}"
                                    style="height: 400px; width: 100%; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                </div>
                            </div>
                        </div>
                        @endif
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
                                    <form action="{{ route('save-jobs.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                                        <button type="submit" class="d-block btn"><i class="fa fa-heart-o mr-1"></i>{{__('Save Job')}}</button>
                                    </form>
                                    @endif
                                </div>
                                <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-1">
                                    @if($job->phone)
                                    <a href="tel:{{ $job->phone }}" class="d-block btn btn-alt">
                                        <i class="lni lni-phone"></i> {{ __('Call') }}
                                    </a>
                                    @else
                                    <a href="#" class="d-block btn btn-alt">{{__('Apply')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar (Apply Buttons) End -->

                    <!-- Sidebar (Job Overview) Start -->
                    <div class="sidebar-widget job-overview-widget">
                        <div class="inner">
                            <h6 class="title">
                                <i class="lni lni-clipboard"></i>
                                {{__('Job Overview')}}
                            </h6>
                            <ul class="job-overview list-unstyled">
                                @php
                                use Carbon\Carbon;
                                $deadline = $job->deadline ? Carbon::parse($job->deadline)->format('d.m.Y') : __('Not specified');
                                $published = Carbon::parse($job->created_at)->format('d.m.Y');
                                @endphp

                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-calendar"></i>
                                        <strong>{{__('Published on')}}:</strong>
                                        <span>{{ $published }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-briefcase"></i>
                                        <strong>{{__('Job Type')}}:</strong>
                                        <span>{{ $job->type->translated_name }}</span>
                                    </div>
                                </li>
                                @if($job->employmentType)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-users"></i>
                                        <strong>{{__('Employment Type')}}:</strong>
                                        <span>{{ $job->employmentType->translated_name }}</span>
                                    </div>
                                </li>
                                @endif
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-map"></i>
                                        <strong>{{__('District')}}:</strong>
                                        <span>{{ $job->district->translated_name ?? __('Not specified') }}</span>
                                    </div>
                                </li>

                                @if($job->phone)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-phone"></i>
                                        <strong>{{__('Phone')}}:</strong>
                                        <span><a href="tel:{{ $job->phone }}" class="text-primary">{{ $job->phone }}</a></span>
                                    </div>
                                </li>
                                @endif

                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-coin"></i>
                                        <strong>{{__('Salary')}}:</strong>
                                        <span class="salary-info">
                                            @if($job->salary_from || $job->salary_to)
                                            @if($job->salary_from && $job->salary_to)
                                            {{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }}
                                            @elseif($job->salary_from)
                                            {{ __('From') }} {{ number_format($job->salary_from, 0, ',', ' ') }} {{__('sum')}}
                                            @else
                                            {{ __('Up to') }} {{ number_format($job->salary_to, 0, ',', ' ') }} {{__('sum')}}
                                            @endif
                                            @else
                                            {{ __('Negotiable') }}
                                            @endif
                                        </span>
                                    </div>
                                </li>

                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-alarm-clock"></i>
                                        <strong>{{__('Deadline')}}:</strong>
                                        <span>{{ $deadline }}</span>
                                    </div>
                                </li>

                                @if($job->status)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-checkmark-circle"></i>
                                        <strong>{{ __('Status') }}:</strong>
                                        <span class="status-badge status-{{ strtolower($job->status) }}">
                                            <i class="lni lni-{{ $job->status == 'active' ? 'checkmark-circle' : ($job->status == 'pending' ? 'time' : 'close') }}"></i>
                                            {{ __(ucfirst($job->status)) }}
                                        </span>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar (Job Overview) End -->

                    <!-- Sidebar (Posted By) Start -->
                    @if($job->user)
                    <div class="sidebar-widget">
                        <div class="inner">
                            <h6 class="title">{{__('Posted By')}}</h6>
                            <div class="posted-by">
                                <div class="d-flex align-items-center">
                                    <div class="avatar mr-3">
                                        <i class="lni lni-user" style="font-size: 2.5rem; color: #6c757d;"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="mb-1">{{ $job->user->first_name ?? $job->user->name }}</h6>
                                        @if($job->user->last_name)
                                        <h6 class="mb-1">{{ $job->user->last_name }}</h6>
                                        @endif
                                        @if($job->user->phone)
                                        <small class="text-muted d-block">{{ __('Phone') }}: {{ $job->user->phone }}</small>
                                        @endif
                                        <small class="text-muted">{{ __('Member since') }} {{ $job->user->created_at->format('Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Sidebar (Posted By) End -->
                </div>
            </div>
            <!-- Job Sidebar Wrap End -->
        </div>
    </div>
</div>
<!-- End Job Details -->

<!-- Lightbox Modal -->
<div id="imageLightbox" class="lightbox-overlay" onclick="closeLightbox()">
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <button class="close-btn" onclick="closeLightbox()">&times;</button>
        <div class="image-counter" id="imageCounter">1 / 1</div>

        <button class="nav-arrow prev" id="prevBtn" onclick="previousImage()">&#8249;</button>
        <img id="lightboxImage" class="lightbox-image" src="" alt="Full size image">
        <button class="nav-arrow next" id="nextBtn" onclick="nextImage()">&#8250;</button>

        <div class="lightbox-controls">
            <button class="lightbox-btn" onclick="previousImage()">
                <i class="lni lni-chevron-left"></i>
            </button>
            <button class="lightbox-btn" onclick="closeLightbox()">
                <i class="lni lni-close"></i>
            </button>
            <button class="lightbox-btn" onclick="nextImage()">
                <i class="lni lni-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

@endsection