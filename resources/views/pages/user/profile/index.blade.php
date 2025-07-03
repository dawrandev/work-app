@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Profile')" :description="''" :page="__('Profile')" />

<div class="{{ $sectionClass ?? 'default-section' }} section">
    <div class="container">
        <div class="alerts-inner">
            <!-- Profile Content -->
            @yield('profile-content')
            <!-- End Profile Content -->
        </div>
    </div>
</div>
@endsection