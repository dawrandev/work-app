@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Edit Service')" :description="__('Edit your service')" :page="__('Edit Service')" />
<section class="add-resume section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="add-resume-inner box">
                    <div class="row">
                        <div class="post-header align-items-center justify-content-center">
                            <div class="text-right mb-3" style="font-size: 1rem; font-weight: normal;">
                                @auth
                                <h3>Edit Service Information</h3>
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </div>
                        </div>
                        @endauth
                    </div>
                    <form class="form-ad" action="{{ route('offers.update', $offer->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Profession Title</label>
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title', $offer->title) }}">
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
                                        <option value="{{ $district->id }}" {{ old('district_id', $offer->district_id) == $district->id ? 'selected' : '' }}>{{ $district->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            @livewire('service-store', ['selectedCategoryId' => old('category_id', $offer->category_id), 'selectedSubcategoryId' => old('subcategory_id', $offer->subcategory_id)])
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Type</label>
                                    <select class="form-control" name="type_id">
                                        <option value="">Select Type</option>
                                        @foreach (getTypes() as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id', $offer->type_id) == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
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
                                        <option value="{{ $type->id }}" {{ old('employment_type_id', $offer->employment_type_id) == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('employment_type_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary From') }}</label>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" placeholder="Uzs" value="{{ old('salary_from', $offer->salary_from) }}">
                                    @error('salary_from')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary To') }}</label>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ old('salary_to', $offer->salary_to) }}" placeholder="Uzs">
                                    @error('salary_to')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Location</label>
                                    <input type="text" class="form-control" placeholder="Location, e.g" name="address" value="{{ old('address', $offer->address) }}">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="99 999 99 99" id="phone" value="{{ old('phone', $offer->phone) }}">
                                    @error('phone')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" name="description">{{ old('description', $offer->description) }}</textarea>
                            @error('description')
                            <li style="color: red;">{{ $message }}</li>
                            @enderror
                        </div>

                        <!-- Existing Images -->
                        @if($offer->images && count($offer->images) > 0)
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>{{ __('Current Images') }}</label>
                                <div class="current-images-container">
                                    <div class="row">
                                        @foreach($offer->images as $image)
                                        <div class="col-md-3 mb-3">
                                            <div class="image-item position-relative">
                                                <img src="{{ asset('storage/' . $image->path) }}" alt="Offer Image" class="img-thumbnail" style="width: 100%; height: 150px; object-fit: cover;">
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="delete_images[]" value="{{ $image->id }}" id="delete_image_{{ $image->id }}">
                                                    <label class="form-check-label text-danger" for="delete_image_{{ $image->id }}">
                                                        {{ __('Delete this image') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>{{ __('Upload New Images') }}</label>
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
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="button">
                                    <a href="{{ route('offers.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                    <input type="submit" value="Update" class="btn btn-alt">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Reset uploaded files array when page loads
        uploadedFiles = [];

        // Initialize file upload if elements exist
        if (document.getElementById('imageInput') && document.getElementById('imagePreview')) {
            setupFileUpload();
        }
    });
</script>
@endsection