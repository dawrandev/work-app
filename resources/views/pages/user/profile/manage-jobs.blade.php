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
                    <h3 class="page-title">{{ __('Manage Jobs') }}</h3>
                </div>
            </div>
        </div>

        @livewire('manage-jobs-filter')
    </div>
</div>
@endsection