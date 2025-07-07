@extends('layouts.user.main')

@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

@endpush
<x-user.breadcrumb :title="__('Post a Job')" :description="__('Post your job vacancies and attract the best talent for your business.')" :page="__('Post a Job')" />

<section class="job-post section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="job-information">
                    <h3 class="title">{{ __('Job Information') }}</h3>
                    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data" id="jobPostForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job title*') }}</label>
                                    <input class="form-control" name="title" type="text" value="{{ old('title') }}">
                                    @error('title')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                            @livewire('job-store')

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Job Types*') }}</label>
                                    <select class="select" name="type_id">
                                        <option value="">{{__('Select Work Type') }}</option>
                                        @foreach (getTypes() as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Employment Type*') }}</label>
                                    <select class="select" name="employment_type_id">
                                        <option value="">{{ __('Select Employment Type') }}</option>
                                        @foreach (getEmploymentTypes() as $employmentType)
                                        <option value="{{ $employmentType->id }}" {{ old('employment_type_id') == $employmentType->id ? 'selected' : '' }}>{{ $employmentType->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('employment_type_id')
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
                                        <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" name="phone" class="form-control" placeholder="99 999 99 99" id="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary From') }}</label>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" placeholder="Uzs" value="{{ old('salary_from') }}">
                                    @error('salary_from')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary To') }}</label>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ old('salary_to') }}" placeholder="Uzs">
                                    @error('salary_to')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address*') }}</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" placeholder="{{ __('Enter address or select on map') }}">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Deadline') }}</label>
                                    <div class="input-group date" id="datetimepicker">
                                        <input type="datetime-local" name="deadline" class="form-control" placeholder="" value="{{ old('deadline') }}">
                                        @error('deadline')
                                        <li style="color: red;">{{ $message }}</li>
                                        @enderror
                                        <span class="input-group-addon"></span>
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Leaflet Maps (Google Maps o'rniga) -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Select Location on Map') }}</label>
                                    <div id="map" style="height: 400px; border-radius: 8px; overflow: hidden; z-index: 1;"></div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="getCurrentLocation()">
                                            <i class="lni lni-map-marker"></i> {{ __('Use Current Location') }}
                                        </button>
                                        <button type="button" class="btn btn-sm btn-info" onclick="searchAddress()">
                                            <i class="lni lni-search"></i> {{ __('Find Address') }}
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="clearLocation()">
                                            <i class="lni lni-trash"></i> {{ __('Clear') }}
                                        </button>
                                    </div>
                                    <div class="coordinates-info mt-2">
                                        <small>{{ __('Latitude') }}: <span id="latDisplay">-</span> | {{ __('Longitude') }}: <span id="lngDisplay">-</span></small>
                                    </div>
                                    <!-- Hidden coordinates -->
                                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job Description*') }}</label>
                                    <div class="editor-container">

                                        <textarea name="description" id="description" class="form-control">{{ old('description', $job->description ?? '') }}</textarea>
                                    </div>
                                    @error('description')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <!-- Simple File Upload (Dropzone o'rniga) -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Upload Images') }}</label>
                                    <div class="custom-file-upload" id="fileUploadArea">
                                        <div class="upload-area" onclick="document.getElementById('imageInput').click()">
                                            <i class="lni lni-cloud-upload"></i>
                                            <h4>{{ __('Click to upload or drag and drop') }}</h4>
                                            <p>{{ __('Maximum 3 images, 5MB per file') }}</p>
                                        </div>
                                        <input type="file" id="imageInput" name="images[]" multiple accept="image/*" style="display: none;">
                                        <div id="imagePreview" class="image-preview-container"></div>
                                    </div>
                                    @error('images')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 button">
                                <button class="btn" type="submit">{{__('Post a Job')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script src="{{ asset('assets/user/js/summernote-lite.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: 'Job tavsifini kiriting...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']]
            ]
        });
    });
</script>
@endpush