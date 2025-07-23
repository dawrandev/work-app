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
                                @if ($job->type->id == 1)
                                <span class="badge badge-success">
                                    <i class="lni lni-briefcase"></i>
                                    {{ $job->type->translated_name }}
                                </span>
                                @else
                                <span class="badge badge-success">
                                    <i class="lni lni-timer"></i>
                                    {{ $job->type->translated_name }}
                                </span>
                                @endif
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
                        <p>{!! $job->description !!}</p>

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
                                    style="height: 400px; width: 100%; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); z-index: 1; position: relative;">
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
                                <div class="col-12 p-1 mb-2">
                                    @if (auth()->check())
                                    <form action="{{ route('save-jobs.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                                        <button type="submit" class="d-block btn w-100">
                                            <i class="lni lni-bookmark mr-1"></i>{{__('Save Job')}}
                                        </button>
                                    </form>
                                    @endif
                                </div>

                                <div class="col-6 p-1">
                                    @if($job->phone)
                                    <a href="tel:{{ $job->phone }}" class="d-block btn btn-alt">
                                        <i class="lni lni-phone mr-1"></i> {{ __('Call') }}
                                    </a>
                                    @endif
                                </div>
                                <div class="col-6 p-1">
                                    <a href="#" class="d-block btn btn-alt" onclick='handleApply({{ $job->id }})'>
                                        <i class="lni lni-pointer-right mr-1"></i>{{__('Apply')}}
                                    </a>
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

                                @if($job->approval_status)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-shield"></i>
                                        <strong>{{ __('Approval Status') }}:</strong>
                                        <span class="status-badge status-{{ strtolower($job->approval_status) }}">
                                            @if($job->approval_status == 'approved')
                                            <i class="lni lni-checkmark"></i>
                                            {{ __('Approved') }}
                                            @elseif($job->approval_status == 'rejected')
                                            <i class="lni lni-close"></i>
                                            {{ __('Rejected') }}
                                            @elseif($job->approval_status == 'pending')
                                            <i class="lni lni-hourglass"></i>
                                            {{ __('Pending') }}
                                            @else
                                            <i class="lni lni-question-circle"></i>
                                            {{ __(ucfirst($job->approval_status)) }}
                                            @endif
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
                                    </div>
                                </div>
                            </div>

                            <!-- Applicants Button - Only for job owner -->
                            @if(auth()->check() && auth()->user()->id == $job->user_id)
                            <div class="mt-3">
                                <a href="{{ route('job-applies.applicants', $job->id) }}" class="d-block btn btn-success">
                                    <i class="lni lni-users mr-1"></i>{{__('View Applicants')}}
                                </a>
                            </div>
                            @endif
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

<!-- Modal 1 -->
<div class="apply-modal" id="noOfferModal">
    <div class="apply-modal-dialog">
        <div class="apply-modal-main" style="position: relative;">
            <button class="apply-close-modal" onclick="closeApplyModal('noOfferModal')">&times;</button>
            <div class="heading">
                <h3>{{__('Create your offer first')}}</h3>
            </div>
            <p style="color: #666; margin-bottom: 30px;">
                {{__('To apply for a job, you need to enter information about yourself first.')}}
            </p>
            <div class="button">
                <button class="btn" onclick="createProfile()">{{__('Create Offer')}}</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2: Bitta offer -->
<div class="apply-modal" id="singleOfferModal">
    <div class="apply-modal-dialog">
        <div class="apply-modal-main" style="position: relative;">
            <button class="apply-close-modal" onclick="closeApplyModal('singleOfferModal')">&times;</button>
            <div class="heading">
                <h3>{{__('Apply for job')}}</h3>
            </div>

            <!-- FORM qo'shish -->
            <form id="singleOfferForm" action="{{ route('job-applies.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="label">{{__('Cover Letter (optional)')}}</label>
                    <textarea
                        class="form-control"
                        name="cover_letter"
                        placeholder="{{__('Briefly write why you are suitable for this position...')}}"
                        maxlength="500"
                        oninput="updateApplyCharCount(this, 'charCount1')"></textarea>
                    <div class="apply-character-count">
                        <span id="charCount1">0</span>/500 {{__('characters')}}
                    </div>
                </div>

                <!-- Hidden inputs -->
                <input type="hidden" id="jobIdInput" name="job_id">
                <input type="hidden" id="offerIdInput" name="offer_id">

                <div class="button">
                    <button type="submit" class="btn">{{__('Apply')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3: Ko'p offerlar -->
<div class="apply-modal" id="multipleOffersModal">
    <div class="apply-modal-dialog">
        <div class="apply-modal-main" style="position: relative;">
            <button class="apply-close-modal" onclick="closeApplyModal('multipleOffersModal')">&times;</button>
            <div class="heading">
                <h3>{{__('Apply for job')}}</h3>
            </div>

            <form action="{{ route('job-applies.store') }}" method="POST" id="job-apply-form">
                @csrf

                <div class="form-group">
                    <label class="label">{{__('Select your offer')}}</label>
                    <select class="form-control" name="offer_id" id="offerSelect" required>
                        <option value="">{{__('Select offer...')}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="label">{{__('Cover Letter (optional)')}}</label>
                    <textarea
                        class="form-control"
                        name="cover_letter"
                        placeholder="{{__('Briefly write why you are suitable for this position...')}}"
                        maxlength="500"
                        oninput="updateApplyCharCount(this, 'charCount2')"></textarea>
                    <div class="apply-character-count">
                        <span id="charCount2">0</span>/500 {{__('characters')}}
                    </div>
                </div>

                <input type="hidden" id="jobIdInputMultiple" name="job_id">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div class="button">
                    <button type="submit" class="btn">{{__('Apply')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection