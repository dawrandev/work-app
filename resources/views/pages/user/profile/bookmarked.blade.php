@php
$sectionClass = 'bookmarked';
@endphp

@extends('pages.user.profile.index')

@section('profile-content')
<div class="col-lg-8 col-12">
    <div class="job-items">
        @foreach ($orders as $order)
        <div class="manage-content">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="title-img">
                        <div class="can-img">
                            <img src="{{ asset('assets/images/jobs/manage-job1.png') }}" alt="#">
                        </div>
                        <h3>{{ $order->category->translated_name }} <span>{{ $order->title }}</span></h3>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p><span class="time">{{ $order->type->translated_name }}</span></p>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <p class="location"><i class="lni lni-map-marker"></i> {{ $order->district->translated_name }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="button">
                        <a href="job-details.html" class="btn">{{__('Apply')}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <div class="pagination left pagination-md-center">
        <ul class="pagination-list">
            <li><a href="#"><i class="lni lni-arrow-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><i class="lni lni-arrow-right"></i></a></li>
        </ul>
    </div>
    <!-- End Pagination -->
</div>
@endsection