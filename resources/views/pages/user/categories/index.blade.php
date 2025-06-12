@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Categories')" :description="__('Job categories here.')" :page="__('Categories')" />
<!-- Start Job Category Area -->
<section class="job-category section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">{{__('Job Category')}}</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{__('Choose Your Desire Category')}}</h2>
                </div>
            </div>
        </div>
        <div class="cat-head">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="{{ route('categories.show', $category->id) }}" class="single-cat wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <h3>{{ $category->translated_name }}</h3>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
</section>
<!-- /End Job Category Area -->
<section class="all-categories section">
    <div class="container">
        <h2 class="categories-title">{{__('Browse All Categories')}}</h2>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <h3 class="cat-title">{{ $category->translated_name }}
                    @if ($category->subCategories->count())
                    <span>{{ $category->subCategories->count() }}</span>
                    @endif
                </h3>
            </div>
            @foreach ($category->subCategories as $subCategory)
            <div class="col-lg-3 col-md-6 col-xs-12 d-flex justify-content-center align-items-center">
                <ul class="w-100 text-center">
                    <li><a href="{{ route('subCategories.show', $subCategory->id) }}">{{ $subCategory->translated_name }}</a></li>
                </ul>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</section>
@endsection