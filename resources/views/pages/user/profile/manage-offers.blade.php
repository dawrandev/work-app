@php
$sectionClass = 'manage-jobs';
@endphp
@extends('pages.user.profile.index')

@section('profile-content')
<div class="row">
    <div class="col-12">
        <!-- Page Header with Button -->
        <div class="page-header-content mb-4">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <h3 class="page-title">{{ __('Manage Offers') }}</h3>
                    <p class="text-muted mb-0">{{ __('Manage your offer postings') }}</p>
                </div>
            </div>
        </div>

        @livewire('manage-offers-filter')
    </div>
</div>
@endsection