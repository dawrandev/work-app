@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Browse Job')" :description="__('Find the right job that matches your skills and interests')" :page="__('Browse Job')" />

<!-- Start Find Job Area -->
<section class="find-job section">
    <div class="search-job">
        <div class="container">
            <div class="search-nner">
                <form action="#" method="GET">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-3">
                            <select class="select" id="category_id" name="category_id">
                                <option value="">{{ __('Select Category') }}</option>
                                @foreach (getCategories() as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->translated_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-3">
                            <select class="select" id="district_id" name="district_id">
                                <option value="">{{ __('Select District') }}</option>
                                @foreach (getDistricts() as $district)
                                <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                    {{ $district->translated_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-3">
                            <select class="select" id="type_id" name="type_id">
                                <option value="">{{ __('Select Type') }}</option>
                                @foreach (getTypes() as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->translated_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                            <button type="submit" class="btn btn-primary d-block">{{__('Filter')}}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="single-head">
            <div class="row">
                @foreach ($jobs as $job)
                <div class="col-lg-6 col-12">
                    <!-- Single Job -->
                    <div class="single-job">
                        <div class="job-image">
                            <img src="{{asset('assets/images/category-icons/plumber.png')}}" alt="#">
                        </div>
                        <div class="job-content">
                            <h4><a href="{{ route('jobs.show', $job->id) }}">{{ $job->category->translated_name }}</a></h4>
                            <p>{{ $job->title }}</p>
                            <ul>
                                <li></i>{{ number_format($job->salary_from, 0, ',', ' ') }} - {{ number_format($job->salary_to, 0, ',', ' ') }} sum</li>
                                <li><i class="lni lni-map-marker"></i>{{ $job->district->translated_name }}</li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                <li><a href="{{ route('jobs.show', ['job' => $job->id]) }}">{{__('Details') }}</a></li>
                                <li><span>{{ $job->type->translated_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Job -->
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            @if ($jobs->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            @if ($jobs->onFirstPage())
                            <li class="disabled"><span><i class="lni lni-arrow-left"></i></span></li>
                            @else
                            <li><a href="{{ $jobs->previousPageUrl() }}"><i class="lni lni-arrow-left"></i></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                            @if ($page == $jobs->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                            @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($jobs->hasMorePages())
                            <li><a href="{{ $jobs->nextPageUrl() }}"><i class="lni lni-arrow-right"></i></a></li>
                            @else
                            <li class="disabled"><span><i class="lni lni-arrow-right"></i></span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!--/ End Pagination -->
        </div>
    </div>
</section>
<!-- /End Find Job Area -->
@endsection