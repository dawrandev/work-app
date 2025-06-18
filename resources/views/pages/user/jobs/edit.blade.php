@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Update a Job')" :description="'fsdfas'" :page="__('Update a Job')" />

<section class="job-post section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="job-information">
                    <h3 class="title">{{ __('Job Information') }}</h3>
                    <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job title*') }}</label>
                                    <input class="form-control" name="title" type="text" name="title" value="{{ old('title', $job->title) }}">
                                    @error('title')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Category*') }}</label>
                                    <select class="select" name="category_id">
                                        <option value="">{{ __('Select Category') }}</option>
                                        @foreach (getCategories() as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $job->category_id) == $category->id ? 'selected' : ''}}>{{ $category->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('SubCategory*') }}</label>
                                    <select class="select" name="subcategory_id">
                                        <option value="">{{ __('Select SubCategory') }}</option>
                                        @foreach (getSubCategories() as $category)
                                        <option value="{{ $category->id }}" {{ old('subcategory_id', $job->subcategory_id) == $category->id ? 'selected' : ''}}>{{ $category->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Job Types*') }}</label>
                                    <select class="select" name="type_id">
                                        <option value="">{{__('Select Work Type') }}</option>
                                        @foreach (getTypes() as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id', $job->type_id) == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Districts') }}</label>
                                    <select class="select" name="district_id">
                                        <option value="">{{ __('Select District') }}</option>
                                        @foreach (getDistricts() as $district)
                                        <option value="{{ $district->id }}" {{ old('district_id', $job->district_id) == $district->id ? 'selected' : '' }}>{{ $district->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address') }}</label>
                                    <input type="text" name="address" class="form-control" id="" value="{{ old('address', $job->address) }}" placeholder="">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary From') }}</label>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" placeholder="Uzs" value="{{ old('salary_from', $job->salary_from) }}">
                                    @error('salary_from')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary To') }}</label>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" placeholder="Uzs" value="{{ old('salary_to', $job->salary_to) }}">
                                    @error('salary_to')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Deadline') }}</label>
                                    <div class="input-group date" id="datetimepicker">
                                        <input type="datetime-local" name="deadline" class="form-control" placeholder="12/11/2020" value="{{ old('deadline', $job->deadline) }}">
                                        @error('deadline')
                                        <li style="color: red;">{{ $message }}</li>
                                        @enderror
                                        <span class="input-group-addon"></span>
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job Description*') }}</label>
                                    <textarea name="description" class="form-control" rows="5">{{ old('description', $job->description) }}</textarea>
                                    @error('description')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Upload Images') }}</label>
                                    <input type="file" name="images[]" multiple>
                                    @error('images')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror

                                    @foreach($errors->get('images.*') as $messages)
                                    @foreach ($messages as $message)
                                    <li style="color: red;">{{ $message }}</li>
                                    @endforeach
                                    @endforeach

                                    @if (!empty($job->job_images) && count($job->job_images) > 0)
                                    <div class="post-details mt-3">
                                        <div class="post-image">
                                            <div class="row">
                                                @foreach ($job->job_images as $image)
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <button type="button" class="mb-4 border-0 bg-transparent p-0" data-img="{{ asset('storage/jobs/' . $image['image']) }}">
                                                        <img src="{{ asset('storage/jobs/' . $image['image']) }}" alt="job image" class="img-thumbnail" id="myImg">
                                                    </button>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 button">
                                <button class="btn">{{__('Update a Job')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection