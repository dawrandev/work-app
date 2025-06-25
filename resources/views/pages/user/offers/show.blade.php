@extends('layouts.user.main')

@section('content')

<x-user.breadcrumb :title="__('Offer Details')" :description="__('View detailed information about the offer, including requirements, salary, and application process')" :page="__('Offer Details')" />

<!-- Start Offer Details -->
<div class="offer-details section">
    <div class="container">
        <div class="row mb-n5">
            <!-- Offer List Details Start -->
            <div class="col-lg-8 col-12">
                <div class="offer-details-inner">
                    <div class="offer-details-head row mx-0">
                        <div class="company-logo col-auto">
                            <div class="offer-image">
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
                            <div class="offer-badges mt-2">
                                <span class="badge badge-success">{{ $offer->type->translated_name }}</span>
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
                                <li><i class="lni lni-map-marker"></i><strong class="text-primary">{{ $offer->district->translated_name ?? __('Not specified') }}</strong></li>
                                @if($offer->address)
                                <li>{{ $offer->address }}</li>
                                @endif
                            </ul>

                            <!-- Employment Type Info -->
                            @if($offer->employmentType)
                            <div class="employment-info mt-2">
                                <span class="employment-tag">
                                    <i class="lni lni-briefcase-alt"></i>
                                    <span class="employment-text">{{ $offer->employmentType->translated_name }}</span>
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="offer-details-body">
                        <!-- Offer Description -->
                        <h6 class="mb-3">{{__('Offer Description')}}</h6>
                        <p>{{ $offer->description }}</p>

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
                                                class="img-thumbnail offer-image-thumb"
                                                style="cursor: pointer; height: 150px; width: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Offer List Details End -->

            <!-- Offer Sidebar Wrap Start -->
            <div class="col-lg-4 col-12">
                <div class="offer-details-sidebar">
                    <!-- Sidebar (Apply Buttons) Start -->
                    <div class="sidebar-widget">
                        <div class="inner">
                            <div class="row m-n2 button">
                                <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-1">
                                    @if (auth()->check())
                                    <form action="{{ route('save-offers.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                                        <button type="submit" class="d-block btn"><i class="fa fa-heart-o mr-1"></i>{{__('Save Offer')}}</button>
                                    </form>
                                    @endif
                                </div>
                                <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-1">
                                    @if($offer->phone)
                                    <a href="tel:{{ $offer->phone }}" class="d-block btn btn-alt">
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

                    <!-- Sidebar (Offer Overview) Start -->
                    <div class="sidebar-widget offer-overview-widget">
                        <div class="inner">
                            <h6 class="title">
                                <i class="lni lni-clipboard"></i>
                                {{__('Offer Overview')}}
                            </h6>
                            <ul class="offer-overview list-unstyled">
                                @php
                                use Carbon\Carbon;
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

                                @if($offer->address)
                                <li>
                                    <div class="overview-content">
                                        <i class="lni lni-map-marker"></i>
                                        <strong>{{__('Address')}}:</strong>
                                        <span>{{ $offer->address }}</span>
                                    </div>
                                </li>
                                @endif

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
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar (Offer Overview) End -->

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
                                        <small class="text-muted">{{ __('Member since') }} {{ $offer->user->created_at->format('Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Sidebar (Posted By) End -->
                </div>
            </div>
            <!-- Offer Sidebar Wrap End -->
        </div>
    </div>
</div>
<!-- End Offer Details -->

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

@endsectio