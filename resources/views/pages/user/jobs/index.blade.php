@extends('layouts.user.main')
@section('title', __('All Jobs'))
@section('content')
<x-user.breadcrumb :title="__('Browse Job')" :description="__('Find the right job that matches your skills and interests')" :page="__('Browse Job')" />

<!-- Start Find Job Area -->
<section class="find-job section">
    @livewire('job-filter', [
    'initialJobsData' => $jobsData ?? null,
    'initialFilters' => $filters ?? []
    ])
</section>
<!-- /End Find Job Area -->
@endsection