@extends('layouts.admin.main')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/feather-icon.css')}}">
@endpush

@section('content')
<x-admin.breadcrumb :title="'Offer Details'">
    <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">
        <i data-feather="arrow-left"></i>
        Back to Offers
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <!-- Left Column - Offer Info -->
        <div class="col-lg-8">
            <!-- Offer Header Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="d-flex align-items-center">
                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 60px; height: 60px;">
                                <i data-feather="user-check" class="text-white" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h3 class="mb-1">{{ $offer->title }}</h3>
                                <div class="d-flex align-items-center gap-3">
                                    <span class="badge bg-light text-dark">{{ $offer->category->name[app()->getLocale()] ?? $offer->category->name['uz'] ?? 'N/A' }}</span>
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
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i data-feather="file-text" class="text-primary"></i>
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
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i data-feather="image" class="text-primary"></i>
                        Offer Images
                        <span class="badge bg-primary ms-2">{{ $offer->images->count() }}</span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach($offer->images as $image)
                        <div class="col-md-4 col-sm-6">
                            <div class="position-relative">
                                <img src="{{ asset('storage/offers/' . $image->image_path) }}"
                                    alt="Offer Image"
                                    class="img-fluid rounded shadow-sm"
                                    style="height: 200px; width: 100%; object-fit: cover;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#imageModal"
                                    data-image="{{ asset('storage/offers/' . $image->image_path) }}">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-dark bg-opacity-75">
                                        <i data-feather="zoom-in"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Location Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i data-feather="map-pin" class="text-primary"></i>
                        Location
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Offer Address</h6>
                            <p class="mb-0">
                                <i data-feather="map-pin" class="text-success me-2"></i>
                                {{ $offer->address }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">District</h6>
                            <p class="mb-0">
                                <span class="badge bg-info">{{ $offer->district->name[app()->getLocale()] ?? $offer->district->name['uz'] ?? 'N/A' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Offer Details & Actions -->
        <div class="col-lg-4">
            <!-- Admin Actions Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i data-feather="settings" class="text-primary"></i>
                        Admin Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($offer->approval_status == 'pending')
                        <form method="POST" action="{{ route('admin.offers.approve', $offer->id) }}" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success w-100 mb-2">
                                <i data-feather="check-circle"></i>
                                Approve Offer
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.offers.reject', $offer->id) }}" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning w-100 mb-2">
                                <i data-feather="x-circle"></i>
                                Reject Offer
                            </button>
                        </form>
                        @elseif($offer->approval_status == 'approved')
                        <form method="POST" action="{{ route('admin.offers.reject', $offer->id) }}" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning w-100 mb-2">
                                <i data-feather="x-circle"></i>
                                Reject Offer
                            </button>
                        </form>
                        @elseif($offer->approval_status == 'rejected')
                        <form method="POST" action="{{ route('admin.offers.approve', $offer->id) }}" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success w-100 mb-2">
                                <i data-feather="check-circle"></i>
                                Approve Offer
                            </button>
                        </form>
                        @endif

                        <hr class="my-2">

                        <form method="POST" action="{{ route('admin.offers.destroy', $offer->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this offer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i data-feather="trash-2"></i>
                                Delete Offer
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Offer Information Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i data-feather="info" class="text-primary"></i>
                        Offer Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i data-feather="calendar" class="text-info me-2"></i>
                            <small class="text-muted">Published Date</small>
                        </div>
                        <p class="mb-0 fw-medium">{{ $offer->created_at->format('d F, Y - H:i') }}</p>
                    </div>

                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i data-feather="briefcase" class="text-primary me-2"></i>
                            <small class="text-muted">Employment Type</small>
                        </div>
                        <p class="mb-0 fw-medium">{{ $offer->employmentType->name[app()->getLocale()] ?? $offer->employmentType->name['uz'] ?? 'N/A' }}</p>
                    </div>

                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i data-feather="phone" class="text-success me-2"></i>
                            <small class="text-muted">Contact Phone</small>
                        </div>
                        <p class="mb-0 fw-medium">+998 {{ $offer->phone }}</p>
                    </div>

                    <div class="info-item mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <i data-feather="activity" class="text-info me-2"></i>
                            <small class="text-muted">Offer Status</small>
                        </div>
                        <p class="mb-0">
                            @switch($offer->status)
                            @case('active')
                            <span class="badge bg-success">Active</span>
                            @break
                            @case('paused')
                            <span class="badge bg-warning">Paused</span>
                            @break
                            @case('closed')
                            <span class="badge bg-secondary">Closed</span>
                            @break
                            @case('expired')
                            <span class="badge bg-danger">Expired</span>
                            @break
                            @case('draft')
                            <span class="badge bg-info">Draft</span>
                            @break
                            @endswitch
                        </p>
                    </div>

                    <div class="info-item">
                        <div class="d-flex align-items-center mb-1">
                            <i data-feather="shield" class="text-warning me-2"></i>
                            <small class="text-muted">Approval Status</small>
                        </div>
                        <p class="mb-0">
                            @switch($offer->approval_status)
                            @case('pending')
                            <span class="badge bg-warning">Pending Review</span>
                            @break
                            @case('approved')
                            <span class="badge bg-success">Approved</span>
                            @break
                            @case('rejected')
                            <span class="badge bg-danger">Rejected</span>
                            @break
                            @endswitch
                        </p>
                    </div>
                </div>
            </div>

            <!-- Posted By Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i data-feather="user" class="text-primary"></i>
                        Posted By
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($offer->user->image && $offer->user->image != 'user-icon')
                        <img src="{{ asset('storage/users/' . $offer->user->image) }}"
                            alt="{{ $offer->user->first_name }}"
                            class="rounded-circle shadow"
                            style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                        <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center shadow"
                            style="width: 80px; height: 80px; font-size: 1.5rem;">
                            {{ strtoupper(substr($offer->user->first_name, 0, 1)) }}{{ strtoupper(substr($offer->user->last_name, 0, 1)) }}
                        </div>
                        @endif
                    </div>

                    <h6 class="mb-1">{{ $offer->user->first_name }} {{ $offer->user->last_name }}</h6>
                    <p class="text-muted mb-2">
                        <i data-feather="phone" class="me-1"></i>
                        {{ $offer->user->phone }}
                    </p>

                    <div class="d-grid">
                        <a href="{{ route('admin.users.show', $offer->user->id) }}" class="btn btn-outline-primary btn-sm">
                            <i data-feather="eye"></i>
                            View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="imageModalLabel">
                    <i data-feather="image" class="text-primary me-2"></i>
                    Offer Image
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modalImage" src="" alt="Offer Image" class="img-fluid w-100" style="max-height: 70vh; object-fit: contain;">
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i data-feather="x"></i>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Image modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        if (imageModal) {
            imageModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const imageSrc = button.getAttribute('data-image');
                modalImage.src = imageSrc;
            });
        }
    });
</script>

@push('js')
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon-clipart.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
@endpush