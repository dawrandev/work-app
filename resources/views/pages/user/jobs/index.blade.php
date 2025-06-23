@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Browse Job')" :description="__('Find the right job that matches your skills and interests')" :page="__('Browse Job')" />

<!-- Start Find Job Area -->
<section class="find-job section">
    @livewire('job-filter')
</section>
<!-- /End Find Job Area -->
@endsection