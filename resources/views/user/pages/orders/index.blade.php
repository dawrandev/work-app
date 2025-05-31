@extends('user.layouts.main')

@section('content')
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{__('Browse Job')}}</h1>
                    <p>{{ __('Explore a wide range of job opportunities from various industries') }} <br>
                        {{__('Find the right job that matches your skills and interests.') }}
                    </p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                    <li>{{__('Browse Job')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Find Job Area -->
<section class="find-job section">
    <div class="search-job">
        <div class="container">
            <div class="search-nner">
                <form action="#" method="GET">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-3">
                            <select class="select" name="category_id">
                                <option value="">{{ __('Select Category') }}</option>
                                @foreach (getCategories() as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->translated_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-3">
                            <select class="select" name="district_id">
                                <option value="">{{ __('Select District') }}</option>
                                @foreach (getDistricts() as $district)
                                <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->translated_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-3">
                            <select class="select" name="type_id">
                                <option value="">{{ __('Select Work Type') }}</option>
                                @foreach (getTypes() as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="single-head">
            <div class="row">
                @foreach ($orders as $order)
                <div class="col-lg-6 col-12">
                    <!-- Single Job -->
                    <div class="single-job">
                        <div class="job-image">
                            <img src="{{asset('assets/images/jobs/img1.png')}}" alt="#">
                        </div>
                        <div class="job-content">
                            <h4><a href="job-details.html">{{ $order->category->translated_name }}</a></h4>
                            <p>{{ $order->title }}</p>
                            <ul>
                                <li><i class="lni lni-website"></i><a href="#"> winbrans.com</a></li>
                                <li><i class="lni lni-dollar"></i>{{ $order->salary_from }} - {{ $order->salary_to }}</li>
                                <li><i class="lni lni-map-marker"></i>{{ $order->district }}</li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                <li><a href="job-details.html">Apply</a></li>
                                <li><span>{{ $order->type->translated_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Job -->
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            @if ($orders->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            @if ($orders->onFirstPage())
                            <li class="disabled"><span><i class="lni lni-arrow-left"></i></span></li>
                            @else
                            <li><a href="{{ $orders->previousPageUrl() }}"><i class="lni lni-arrow-left"></i></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                            @if ($page == $orders->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                            @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($orders->hasMorePages())
                            <li><a href="{{ $orders->nextPageUrl() }}"><i class="lni lni-arrow-right"></i></a></li>
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