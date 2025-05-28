@extends('user.layouts.main')

@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{__('Post a Job')}}</h1>
                    <p>{{__('Post your job vacancies')}}<br>{{__('and attract the best talent for your business')}}.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                    <li>{{__('Post a Job')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="job-post section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="job-information">
                    <h3 class="title">{{ __('Job Information') }}</h3>
                    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job title*') }}</label>
                                    <input class="form-control" type="text" name="title">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Category*') }}</label>
                                    <select class="select">
                                        <option value="1">{{ __('Select Category') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Job Types*') }}</label>
                                    <select class="select">
                                        <option value="1">{{ __('Full Time') }}</option>
                                        <option value="2">{{ __('Part Time') }}</option>
                                        <option value="3">{{ __('Contract') }}</option>
                                        <option value="4">{{ __('Internship') }}</option>
                                        <option value="5">{{ __('Office') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('District') }}</label>
                                    <select class="select">
                                        <option value="1">{{ __('Select District') }}</option>
                                        @foreach (getDistricts() as $district)
                                        <option value="1">{{$district->translated_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address') }}</label>
                                    <input type="text" name="address" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Application Deadline') }}</label>
                                    <div class="input-group date" id="datetimepicker">
                                        <input type="text" class="form-control" placeholder="12/11/2020">
                                        <span class="input-group-addon"></span>
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary Currency') }}</label>
                                    <input type="number" name="price" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job Description*') }}</label>
                                    <textarea name="message" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>{{ __('Upload Images') }}</label>
                                <div id="jobDropzone" class="dropzone"></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 button">
                                <button class="btn">
                                    {{ __('Post a Job') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection