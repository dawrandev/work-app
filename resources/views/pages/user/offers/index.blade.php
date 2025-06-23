@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Browse Offer')" :description="__('Find the right offer that matches your skills and interests')" :page="__('Browse Offer')" />

<!-- Start Find Job Area -->
<section class="find-job section">
    @livewire('offer-filter')
</section>
<!-- /End Find Job Area -->
@endsection