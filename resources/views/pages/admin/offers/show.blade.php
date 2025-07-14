@extends('layouts.admin.main')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/feather-icon.css')}}">
@endpush

@section('content')
<x-admin.breadcrumb :title="'Offer Details'">
    <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">
        <i class="icon-arrow-left"></i>
        Back to Offers
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <!-- Left Column - Offer Info -->
        <div class="col-lg-8">
            <!-- Offer Header Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="d-flex align-items-center">
                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 60px; height: 60px;">
                                <i class="icon-briefcase text-white" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h3 class="mb-1">{{ $offer->title }}</h3>
                                <div class="d-flex align-items-center gap-3">
                                    <span class="badge badge-light-primary">
                                        <i class="{{ $offer->category->icon }}"></i>
                                        {{ $offer->category->name[app()->getLocale()] ?? $offer->category->name['uz'] ?? 'N/A' }}
                                    </span>
                                    <span class="text-muted">{{ $offer->subcategory->name[app()->getLocale()] ?? $offer->subcategory->name['uz'] ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <h4 class="text-success mb-0">{{ number_format($offer->salary_from) }} - {{ number_format($offer->salary_to) }} UZS</h4>
                            <small class="text-muted">Salary Range</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Offer Description Card -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-file-text text-primary"></i>
                        Offer Description
                    </h5>
                </div>
                <div class="card-body">
                    <div class="offer-description">
                        {!! $offer->description !!}
                    </div>
                </div>
            </div>

            <!-- Offer Images Card -->
            @if($offer->images && $offer->images->count() > 0)
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-image text-primary"></i>
                        Offer Images
                        <span class="badge badge-primary ms-2">{{ $offer->images->count() }}</span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3 gallery my-gallery" id="aniimated-thumbnials" itemscope="">
                        @foreach($offer->images as $image)
                        <figure class="col-md-4 col-sm-6 img-hover hover-1" itemprop="associatedMedia" itemscope="">
                            <a href="{{ asset('storage/offers/' . $image->image_path) }}" itemprop="contentUrl" data-size="1600x950">
                                <div>
                                    <img src="{{ asset('storage/offers/' . $image->image_path) }}"
                                        class="img-thumbnail"
                                        itemprop="thumbnail"
                                        alt="Offer Image">
                                </div>
                            </a>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Location Card with Map -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-map-pin text-primary"></i>
                        Location
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h6 class="text-muted mb-2">Offer Address</h6>
                            <p class="mb-0">
                                <i class="icon-map-pin text-success me-2"></i>
                                {{ $offer->address }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2">District</h6>
                            <p class="mb-0">
                                <span class="badge badge-light-info">{{ $offer->district->name[app()->getLocale()] ?? $offer->district->name['uz'] ?? 'N/A' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Offer Details & Actions -->
        <div class="col-lg-4">
            <!-- Admin Actions Card -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-settings text-primary"></i>
                        Admin Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($offer->approval_status == 'pending')
                        {{-- Approve Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="approved" class="btn btn-success btn-block">
                                <i class="icon-check"></i>
                                Approve Offer
                            </button>
                            @error('status')
                            <li style="color:red">{{ $message }}</li>
                            @enderror
                        </form>

                        {{-- Reject Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="rejected" class="btn btn-warning btn-block">
                                <i class="icon-close"></i>
                                Reject Offer
                            </button>
                            @error('status')
                            <li style="color:red">{{ $message }}</li>
                            @enderror
                        </form>

                        @elseif($offer->approval_status == 'approved')
                        {{-- Reject Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="rejected" class="btn btn-warning btn-block">
                                <i class="icon-close"></i>
                                Reject Offer
                            </button>
                            @error('status')
                            <li style="color:red">{{ $message }}</li>
                            @enderror
                        </form>

                        @elseif($offer->approval_status == 'rejected')
                        {{-- Approve Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="approved" class="btn btn-success btn-block">
                                <i class="icon-check"></i>
                                Approve Offer
                            </button>
                        </form>
                        @endif

                        <hr class="my-2">

                        {{-- Delete Button --}}
                        <form method="POST" action="{{ route('admin.offers.destroy', $offer->id) }}"
                            onsubmit="return confirm('Are you sure you want to delete this offer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="icon-trash"></i>
                                Delete Offer
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Offer Information Card -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-info text-primary"></i>
                        Offer Information
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        {{-- Published Date --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-calendar text-info me-2"></i>
                                <span class="text-muted">Published Date</span>
                            </div>
                            <span class="fw-medium">{{ \Carbon\Carbon::parse($offer->created_at)->format('d M, Y') }}</span>
                        </li>

                        {{-- Deadline --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-timer text-warning me-2"></i>
                                <span class="text-muted">Deadline</span>
                            </div>
                            <div class="text-end">
                                <i class="ti-calendar text-info me-2"></i>
                                <span class="fw-medium">{{ \Carbon\Carbon::parse($offer->deadline)->format('d M, Y') }}</span>
                                @if(\Carbon\Carbon::parse($offer->deadline)->isPast())
                                <br><small class="text-danger"><i class="ti-na me-1"></i>Expired</small>
                                @endif
                            </div>
                        </li>

                        {{-- Offer Type --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-briefcase text-primary me-2"></i>
                                <span class="text-muted">Offer Type</span>
                            </div>
                            <span class="fw-medium">{{ $offer->type->translated_name }}</span>
                        </li>

                        {{-- Employment --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-user text-success me-2"></i>
                                <span class="text-muted">Employment</span>
                            </div>
                            <span class="fw-medium">{{ $offer->employmentType->name[app()->getLocale()] ?? $offer->employmentType->name['uz'] ?? 'N/A' }}</span>
                        </li>

                        {{-- Contact --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-mobile text-success me-2"></i>
                                <span class="text-muted">Contact</span>
                            </div>
                            <span class="fw-medium">+998 {{ $offer->phone }}</span>
                        </li>

                        {{-- Status --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-pulse text-info me-2"></i>
                                <span class="text-muted">Status</span>
                            </div>
                            @switch($offer->status)
                            @case('active')
                            <span class="badge badge-light-success">Active</span>
                            @break
                            @case('paused')
                            <span class="badge badge-light-warning">Paused</span>
                            @break
                            @case('closed')
                            <span class="badge badge-light-secondary">Closed</span>
                            @break
                            @case('expired')
                            <span class="badge badge-light-danger"><i class="ti-na me-1"></i>Expired</span>
                            @break
                            @case('draft')
                            <span class="badge badge-light-info">Draft</span>
                            @break
                            @endswitch
                        </li>

                        {{-- Approval --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-shield text-warning me-2"></i>
                                <span class="text-muted">Approval</span>
                            </div>
                            @switch($offer->approval_status)
                            @case('pending')
                            <span class="badge badge-light-warning">Pending</span>
                            @break
                            @case('approved')
                            <span class="badge badge-light-success">Approved</span>
                            @break
                            @case('rejected')
                            <span class="badge badge-light-danger">Rejected</span>
                            @break
                            @endswitch
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Posted By Card -->
            @if($offer->user)
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-user text-primary"></i>
                        Posted By
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="avatar-showcase">
                        <div class="avatars">
                            <div class="avatar ratio">
                                @if($offer->user->image && $offer->user->image != 'user-icon')
                                <img class="b-r-8 img-100"
                                    src="{{ asset('storage/users/' . $offer->user->image) }}"
                                    alt="{{ $offer->user->first_name }}">
                                @else
                                <div class="b-r-8 img-100 bg-light-primary d-flex align-items-center justify-content-center">
                                    <span class="f-w-600 f-20">
                                        {{ strtoupper(substr($offer->user->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($offer->user->last_name ?? 'U', 0, 1)) }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-3 mb-1">{{ $offer->user->first_name ?? 'Unknown' }} {{ $offer->user->last_name ?? 'User' }}</h6>
                    <p class="text-muted mb-2">
                        <i class="icon-phone me-1"></i>
                        {{ $offer->user->phone ?? 'No phone' }}
                    </p>

                    <div class="d-grid">
                        <a href="{{ route('admin.users.show', $offer->user->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="icon-eye"></i>
                            View Profile
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- PhotoSwipe gallery for images -->
<script src="{{ asset('assets/admin/js/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/photoswipe/photoswipe.js') }}"></script>
@endpush