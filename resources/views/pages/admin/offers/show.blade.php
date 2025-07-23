@extends('layouts.admin.main')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/feather-icon.css')}}">
@endpush

@section('content')
<x-admin.breadcrumb :title="__('Offer Details')">
    <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">
        <i class="icon-arrow-left"></i>
        {{__('Back to Offers')}}
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
                            <small class="text-muted">{{__('Salary Range')}}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Offer Description Card -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-file-text text-primary"></i>
                        {{__('Offer Description')}}
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
                        {{__('Offer Images')}}
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
                                        alt="{{__('Offer Image')}}">
                                </div>
                            </a>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Location Card -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-map-pin text-primary"></i>
                        {{__('Location')}}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h6 class="text-muted mb-2">{{__('Offer Address')}}</h6>
                            <p class="mb-0">
                                <i class="icon-map-pin text-success me-2"></i>
                                {{ $offer->address }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2">{{__('District')}}</h6>
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
                        {{__('Admin Actions')}}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($offer->approval_status == 'pending')
                        {{-- Approve Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="approved" class="btn btn-success w-100">
                                <i class="icon-check"></i>
                                {{__('Approve Offer')}}
                            </button>
                            @error('approval_status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </form>

                        {{-- Reject Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="rejected" class="btn btn-warning w-100">
                                <i class="icon-close"></i>
                                {{__('Reject Offer')}}
                            </button>
                            @error('approval_status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </form>

                        @elseif($offer->approval_status == 'approved')
                        {{-- Reject Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="rejected" class="btn btn-warning w-100">
                                <i class="icon-close"></i>
                                {{__('Reject Offer')}}
                            </button>
                            @error('approval_status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </form>

                        @elseif($offer->approval_status == 'rejected')
                        {{-- Approve Button --}}
                        <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" name="approval_status" value="approved" class="btn btn-success w-100">
                                <i class="icon-check"></i>
                                {{__('Approve Offer')}}
                            </button>
                            @error('approval_status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </form>
                        @endif

                        <hr class="my-2">

                        {{-- Delete Button --}}
                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $offer->id }}">
                            <i class="icon-trash"></i>
                            {{__('Delete Offer')}}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Offer Information Card -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5>
                        <i class="icon-info text-primary"></i>
                        {{__('Offer Information')}}
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        {{-- Published Date --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-calendar text-info me-2"></i>
                                <span class="text-muted">{{__('Published Date')}}</span>
                            </div>
                            <span class="fw-medium">{{ \Carbon\Carbon::parse($offer->created_at)->format('d M, Y') }}</span>
                        </li>

                        {{-- Deadline --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-timer text-warning me-2"></i>
                                <span class="text-muted">{{__('Deadline')}}</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-medium">{{ \Carbon\Carbon::parse($offer->deadline)->format('d M, Y') }}</span>
                                @if(\Carbon\Carbon::parse($offer->deadline)->isPast())
                                <br><small class="text-danger"><i class="icon-alert-triangle me-1"></i>{{__('Expired')}}</small>
                                @endif
                            </div>
                        </li>

                        {{-- Offer Type --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-briefcase text-primary me-2"></i>
                                <span class="text-muted">{{__('Offer Type')}}</span>
                            </div>
                            <span class="fw-medium">{{ $offer->type->name[app()->getLocale()] ?? $offer->type->name['uz'] ?? 'N/A' }}</span>
                        </li>

                        {{-- Employment --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-user text-success me-2"></i>
                                <span class="text-muted">{{__('Employment')}}</span>
                            </div>
                            <span class="fw-medium">{{ $offer->employmentType->name[app()->getLocale()] ?? $offer->employmentType->name['uz'] ?? 'N/A' }}</span>
                        </li>

                        {{-- Contact --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-mobile text-success me-2"></i>
                                <span class="text-muted">{{__('Contact')}}</span>
                            </div>
                            <span class="fw-medium">+998 {{ $offer->phone }}</span>
                        </li>

                        {{-- Status --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-pulse text-info me-2"></i>
                                <span class="text-muted">{{__('Status')}}</span>
                            </div>
                            @switch($offer->status)
                            @case('active')
                            <span class="badge badge-light-success">{{__('Active')}}</span>
                            @break
                            @case('paused')
                            <span class="badge badge-light-warning">{{__('Paused')}}</span>
                            @break
                            @case('closed')
                            <span class="badge badge-light-secondary">{{__('Closed')}}</span>
                            @break
                            @case('expired')
                            <span class="badge badge-light-danger"><i class="icon-alert-triangle me-1"></i>{{__('Expired')}}</span>
                            @break
                            @case('draft')
                            <span class="badge badge-light-info">{{__('Draft')}}</span>
                            @break
                            @endswitch
                        </li>

                        {{-- Approval --}}
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <i class="icon-shield text-warning me-2"></i>
                                <span class="text-muted">{{__('Approval')}}</span>
                            </div>
                            @switch($offer->approval_status)
                            @case('pending')
                            <span class="badge badge-light-warning">{{__('Pending')}}</span>
                            @break
                            @case('approved')
                            <span class="badge badge-light-success">{{__('Approved')}}</span>
                            @break
                            @case('rejected')
                            <span class="badge badge-light-danger">{{__('Rejected')}}</span>
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
                        {{__('Posted By')}}
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="avatar-showcase">
                        <div class="avatars">
                            <div class="avatar ratio">
                                @if($offer->user->image && $offer->user->image != 'user-icon')
                                <img class="b-r-8 img-100"
                                    src="{{ asset('storage/users/' . $offer->user->image) }}"
                                    alt="{{ $offer->user->first_name }}"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                <div class="b-r-8 img-100 bg-light-primary d-flex align-items-center justify-content-center"
                                    style="width: 100px; height: 100px;">
                                    <span class="f-w-600 f-20">
                                        {{ strtoupper(substr($offer->user->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($offer->user->last_name ?? 'U', 0, 1)) }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-3 mb-1">{{ $offer->user->first_name ?? __('Unknown') }} {{ $offer->user->last_name ?? __('User') }}</h6>
                    <p class="text-muted mb-2">
                        <i class="icon-phone me-1"></i>
                        {{ $offer->user->phone ?? __('No phone') }}
                    </p>

                    <div class="d-grid">
                        <a href="{{ route('admin.users.show', $offer->user->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="icon-eye"></i>
                            {{__('View Profile')}}
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal{{ $offer->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $offer->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $offer->id }}">
                        <i class="icon-trash text-danger me-2"></i>
                        {{ __('Delete Offer') }}
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="{{__('Close')}}"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <i class="icon-alert-triangle text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <p class="text-center">
                        {{ __('Are you sure you want to delete this offer?') }}
                    </p>
                    <div class="alert alert-warning" role="alert">
                        <div class="mb-2">
                            <strong>{{ __('Offer:') }}</strong> {{ $offer->title }}
                        </div>
                        <div>
                            <strong>{{ __('User:') }}</strong> {{ $offer->user->first_name ?? __('Unknown') }} {{ $offer->user->last_name ?? __('User') }}
                        </div>
                    </div>
                    <p class="text-muted small">
                        {{ __('This action cannot be undone. All data related to this offer will be permanently deleted.') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                        <i class="icon-x me-1"></i>
                        {{ __('Cancel') }}
                    </button>
                    <form action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="icon-trash me-1"></i>
                            {{ __('Yes, Delete') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<!-- PhotoSwipe gallery for images -->
<script src="{{ asset('assets/admin/js/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/photoswipe/photoswipe.js') }}"></script>
@endpush