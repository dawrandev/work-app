@extends('layouts.user.main')

@section('content')

<x-user.breadcrumb :title="__('Offer Details')" :description="__('View detailed information about the offer, including requirements, salary, and application process')" :page="__('Offer Details')" />

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
                                <i class="{{ $offer->category->icon }}" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div class="salary-type col-auto order-sm-3">
                            @if($offer->salary_from || $offer->salary_to)
                            <span class="salary-range">
                                @if($offer->salary_from && $offer->salary_to)
                                {{ number_format($offer->salary_from, 0, ',', ' ') }} - {{ number_format($offer->salary_to, 0, ',', ' ') }} {{__('sum')}}
                                @elseif($offer->salary_from)
                                {{ __('From') }} {{ number_format($offer->salary_from, 0, ',', ' ') }} {{__('sum')}}
                                @else
                                {{ __('Up to') }} {{ number_format($offer->salary_to, 0, ',', ' ') }} {{__('sum')}}
                                @endif
                            </span>
                            @else
                            <span class="salary-range">{{ __('Negotiable') }}</span>
                            @endif
                            <div class="job-badges mt-2">
                                @if ($offer->type->id == 1)
                                <span class="badge badge-success">
                                    <i class="lni lni-briefcase"></i>
                                    {{ $offer->type->translated_name }}
                                </span>
                                @else
                                <span class="badge badge-success">
                                    <i class="lni lni-timer"></i>
                                    {{ $offer->type->translated_name }}
                                </span>
                                @endif
                                @if($offer->employmentType)
                                <span class="badge badge-employment">
                                    <i class="lni lni-users"></i>
                                    {{ $offer->employmentType->translated_name }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="content col">
                            <h5 class="title">{{ $offer->title }}</h5>
                            <ul class="meta">
                                <li><strong class="text-primary"><a href="{{ route('categories.show', $offer->category_id) }}">{{ $offer->category->translated_name }}</a></strong></li>
                                <li><strong class="text-primary"><a href="{{ route('subcategories.show', $offer->subcategory_id) }}">{{ $offer->subcategory->translated_name }}</a></strong></li>
                            </ul>
                        </div>
                    </div>

                    <div class="job-details-body">
                        <!-- Job Description -->
                        <h6 class="mb-3">{{__('Offer Description')}}</h6>
                        <p>{!! $offer->description !!}</p>

                        <!-- Images Gallery -->
                        @if (!empty($offer->images) && count($offer->images) > 0)
                        <div class="post-details mt-4">
                            <h6 class="mb-3">{{__('Images')}}</h6>
                            <div class="post-image">
                                <div class="row">
                                    @foreach ($offer->images as $index => $image)
                                    <div class="col-lg-4 col-md-4 col-6">
                                        <div class="image-wrapper mb-3">
                                            <img src="{{ asset('storage/offers/' . $image['image_path']) }}"
                                                alt="Offer image {{ $index + 1 }}"
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
                        @if($offer->latitude && $offer->longitude)
                        <div class="job-location mt-4">
                            <h6 class="mb-3">{{__('Location')}}</h6>

                            <!-- Address Block -->
                            @if($offer->address)
                            <div class="address-block mb-3">
                                <div class="address-content">
                                    <div class="address-icon">
                                        <i class="lni lni-map-marker"></i>
                                    </div>
                                    <div class="address-text">
                                        <h6 class="address-title">{{ __('Offer Address') }}</h6>
                                        <p class="address-detail">{{ $offer->address }}</p>
                                        @if($offer->district)
                                        <span class="district-badge">
                                            <i class="lni lni-map"></i>
                                            {{ $offer->district->translated_name }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="map-container">
                                <div id="jobMap"
                                    data-lat="{{ $offer->latitude }}"
                                    data-lng="{{ $offer->longitude }}"
                                    data-title="{{ str_replace('"', '&quot;', $offer->title) }}"
                                    data-address="{{ str_replace('"', '&quot;', $offer->address) }}"
                                    data-phone="{{ $offer->phone }}"
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
                                    <form action="{{ route('save-offers.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                                        <button type="submit" class="d-block btn w-100">
                                            <i class="lni lni-bookmark mr-1"></i>{{__('Save Offer')}}
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                <div class="col-6 p-1">
                                    @if($offer->phone)
                                    <a href="tel:{{ $offer->phone }}" class="d-block btn btn-alt">
                                        <i class="lni lni-phone mr-1"></i> {{ __('Call') }}
                                    </a>
                                    @endif
                                </div>
                                <div class="col-6 p-1">
                                    <a href="#" class="d-block btn btn-alt" onclick='handleOfferApply({{ $offer->id }})'>
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
                                {{__('Offer Overview')}}
                            </h6>
                            <ul class="job-overview list-unstyled">
                                @php
                                use Carbon\Carbon;
                                $deadline = $offer->deadline ? Carbon::parse($offer->deadline)->format('d.m.Y') : __('Not specified');
                                $published = Carbon::parse($offer->created_at)->format('d.m.Y');
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
                                        <strong>{{__('Offer Type')}}:</strong>
                                        <span>{{ $offer->type->translated_name }}</span>
                                    </div>
                                </li>
                                @if($offer->employmentType)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-users"></i>
                                        <strong>{{__('Employment Type')}}:</strong>
                                        <span>{{ $offer->employmentType->translated_name }}</span>
                                    </div>
                                </li>
                                @endif
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-map"></i>
                                        <strong>{{__('District')}}:</strong>
                                        <span>{{ $offer->district->translated_name ?? __('Not specified') }}</span>
                                    </div>
                                </li>

                                @if($offer->phone)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-phone"></i>
                                        <strong>{{__('Phone')}}:</strong>
                                        <span><a href="tel:{{ $offer->phone }}" class="text-primary">{{ $offer->phone }}</a></span>
                                    </div>
                                </li>
                                @endif

                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-coin"></i>
                                        <strong>{{__('Salary')}}:</strong>
                                        <span class="salary-info">
                                            @if($offer->salary_from || $offer->salary_to)
                                            @if($offer->salary_from && $offer->salary_to)
                                            {{ number_format($offer->salary_from, 0, ',', ' ') }} - {{ number_format($offer->salary_to, 0, ',', ' ') }} {{__('sum')}}
                                            @elseif($offer->salary_from)
                                            {{ __('From') }} {{ number_format($offer->salary_from, 0, ',', ' ') }} {{__('sum')}}
                                            @else
                                            {{ __('Up to') }} {{ number_format($offer->salary_to, 0, ',', ' ') }} {{__('sum')}}
                                            @endif
                                            @else
                                            {{ __('Negotiable') }}
                                            @endif
                                        </span>
                                    </div>
                                </li>

                                @if(isset($offer->deadline))
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-alarm-clock"></i>
                                        <strong>{{__('Deadline')}}:</strong>
                                        <span>{{ $deadline }}</span>
                                    </div>
                                </li>
                                @endif

                                @if($offer->status)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-checkmark-circle"></i>
                                        <strong>{{ __('Status') }}:</strong>
                                        <span class="status-badge status-{{ strtolower($offer->status) }}">
                                            <i class="lni lni-{{ $offer->status == 'active' ? 'checkmark-circle' : ($offer->status == 'pending' ? 'time' : 'close') }}"></i>
                                            {{ __(ucfirst($offer->status)) }}
                                        </span>
                                    </div>
                                </li>
                                @endif

                                @if($offer->approval_status)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-shield"></i>
                                        <strong>{{ __('Approval Status') }}:</strong>
                                        <span class="status-badge status-{{ strtolower($offer->approval_status) }}">
                                            @if($offer->approval_status == 'approved')
                                            <i class="lni lni-checkmark"></i>
                                            {{ __('Approved') }}
                                            @elseif($offer->approval_status == 'rejected')
                                            <i class="lni lni-close"></i>
                                            {{ __('Rejected') }}
                                            @elseif($offer->approval_status == 'pending')
                                            <i class="lni lni-hourglass"></i>
                                            {{ __('Pending') }}
                                            @else
                                            <i class="lni lni-question-circle"></i>
                                            {{ __(ucfirst($offer->approval_status)) }}
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
                    @if($offer->user)
                    <div class="sidebar-widget">
                        <div class="inner">
                            <h6 class="title">{{__('Posted By')}}</h6>
                            <div class="posted-by">
                                <div class="d-flex align-items-center">
                                    <div class="avatar mr-3">
                                        <i class="lni lni-user" style="font-size: 2.5rem; color: #6c757d;"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="mb-1">{{ $offer->user->first_name ?? $offer->user->name }}</h6>
                                        @if($offer->user->last_name)
                                        <h6 class="mb-1">{{ $offer->user->last_name }}</h6>
                                        @endif
                                        @if($offer->user->phone)
                                        <small class="text-muted d-block">{{ __('Phone') }}: {{ $offer->user->phone }}</small>
                                        @endif
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

<!-- Modal 1: No Jobs -->
<div class="apply-modal" id="noJobModal">
    <div class="apply-modal-dialog">
        <div class="apply-modal-main" style="position: relative;">
            <button class="apply-close-modal" onclick="closeOfferApplyModal('noJobModal')">&times;</button>
            <div class="heading">
                <h3>Avval ish e'lonini yarating</h3>
            </div>
            <p style="color: #666; margin-bottom: 30px;">
                Taklifga ariza berish uchun avval ish e'lonini yaratishingiz kerak.
            </p>
            <div class="button">
                <button class="btn" onclick="createJob()">Ish e'loni yaratish</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2: Single Job -->
<div class="apply-modal" id="singleJobModal">
    <div class="apply-modal-dialog">
        <div class="apply-modal-main" style="position: relative;">
            <button class="apply-close-modal" onclick="closeOfferApplyModal('singleJobModal')">&times;</button>
            <div class="heading">
                <h3>Taklifga ariza berish</h3>
            </div>

            <form id="singleJobForm" action="{{ route('offer-applies.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="label">Cover Letter (ixtiyoriy)</label>
                    <textarea
                        class="form-control"
                        name="cover_letter"
                        placeholder="Nima uchun siz bu taklif uchun mos ekanligingizni qisqacha yozing..."
                        maxlength="500"
                        oninput="updateOfferApplyCharCount(this, 'offerCharCount1')"></textarea>
                    <div class="apply-character-count">
                        <span id="offerCharCount1">0</span>/500 belgi
                    </div>
                </div>

                <!-- Hidden inputs -->
                <input type="hidden" id="offerIdInput" name="offer_id">
                <input type="hidden" id="jobIdInput" name="job_id">

                <div class="button">
                    <button type="submit" class="btn">Ariza berish</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3: Multiple Jobs -->
<div class="apply-modal" id="multipleJobsModal">
    <div class="apply-modal-dialog">
        <div class="apply-modal-main" style="position: relative;">
            <button class="apply-close-modal" onclick="closeOfferApplyModal('multipleJobsModal')">&times;</button>
            <div class="heading">
                <h3>Taklifga ariza berish</h3>
            </div>

            <form action="{{ route('offer-applies.store') }}" method="POST" id="offer-apply-form">
                @csrf

                <div class="form-group">
                    <label class="label">Ish e'loningizni tanlang</label>
                    <select class="form-control" name="job_id" id="jobSelect" required>
                        <option value="">Ish e'lonini tanlang...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="label">Cover Letter (ixtiyoriy)</label>
                    <textarea
                        class="form-control"
                        name="cover_letter"
                        placeholder="Nima uchun siz bu taklif uchun mos ekanligingizni qisqacha yozing..."
                        maxlength="500"
                        oninput="updateOfferApplyCharCount(this, 'offerCharCount2')"></textarea>
                    <div class="apply-character-count">
                        <span id="offerCharCount2">0</span>/500 belgi
                    </div>
                </div>

                <input type="hidden" id="offerIdInputMultiple" name="offer_id">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div class="button">
                    <button type="submit" class="btn">Ariza berish</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection