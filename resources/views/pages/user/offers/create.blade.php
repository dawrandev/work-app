@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Create Service')" :description="__('Create a new service')" :page="__('Create Service')" />
<section class="add-resume section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="add-resume-inner box">
                    <div class="row">
                        <div class="post-header align-items-center justify-content-center">
                            <div class="text-right mb-3" style="font-size: 1rem; font-weight: normal;">
                                @auth
                                <h3>Basic information</h3>
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </div>
                        </div>
                        @endauth
                    </div>
                    <form class="form-ad" action="{{ route('offers.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- <div class="row align-items-left justify-content-left">
                            <div class="col-lg-6 col-md-5 col-12">
                                <div class="form-group">
                                    <div class="button-group">
                                        <div class="action-buttons">
                                            <div class="upload-button button">
                                                <button class="btn">Upload Profile Image</button>
                                                <input name="profile_image" id="cover_img_file_3" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Profession Title</label>
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <select class="form-control" name="district_id">
                                        <option value="">Select District</option>
                                        @foreach (getDistricts() as $district)
                                        <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            @livewire('service-store')
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Type</label>
                                    <select class="form-control" name="type_id">
                                        <option value="">Select Type</option>
                                        @foreach (getTypes() as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Employment Type</label>
                                    <select class="form-control" name="employment_type_id">
                                        <option value="">Select Employment Type</option>
                                        @foreach (getEmploymentTypes() as $type)
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
                                    <label>{{ __('Salary From') }}</label>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" placeholder="Uzs" value="{{ old('salary_from') }}" name="salary_from">
                                    @error('salary_from')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary To') }}</label>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ old('salary_to') }}" placeholder="Uzs" name="salary_to">
                                    @error('salary_to')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Location</label>
                                    <input type="text" class="form-control" placeholder="Location, e.g" name="address" value="{{ old('address') }}">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="99 999 99 99" id="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}">
                                    @error('phone')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <li style="color: red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="row align-items-left justify-content-left">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Upload Images') }}</label>
                                    <div class="custom-file-upload" id="fileUploadArea">
                                        <div class="upload-area" onclick="document.getElementById('imageInput').click()">
                                            <i class="lni lni-cloud-upload"></i>
                                            <h4>{{ __('Click to upload or drag and drop') }}</h4>
                                            <p>{{ __('Maximum 5MB per file') }}</p>
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
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="button"><input type="submit" value="Save" class="btn btn-alt"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection