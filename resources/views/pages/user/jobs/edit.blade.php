@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Edit Job')" :description="__('Update your job information to attract the best talent.')" :page="__('Edit Job')" />

<!-- DELETE IMAGE FUNCTION - HEAD SECTION'DA -->
<script>
    // O'chirilishi kerak bo'lgan image IDs
    let imagesToDelete = [];

    function deleteImage(imageId) {
        // Image ID ni delete array'ga qo'sh
        imagesToDelete.push(imageId);

        // DOM'dan image'ni o'chir (visual effect)
        const imageContainer = event.target.closest('.col-md-3');
        if (imageContainer) {
            imageContainer.style.transition = 'opacity 0.3s ease';
            imageContainer.style.opacity = '0';
            setTimeout(() => {
                imageContainer.remove();
            }, 300);
        }
    }

    // Form submit qilganda hidden input'lar qo'shish
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('jobEditForm');

        form.addEventListener('submit', function() {
            // O'chirilishi kerak bo'lgan image'lar uchun hidden input'lar qo'sh
            imagesToDelete.forEach(imageId => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'delete_images[]';
                hiddenInput.value = imageId;
                form.appendChild(hiddenInput);
            });
        });
    });
</script>

<section class="job-post section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="job-information">
                    <h3 class="title">{{ __('Edit Job Information') }}</h3>
                    <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data" id="jobEditForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job title*') }}</label>
                                    <input class="form-control" name="title" type="text" value="{{ old('title', $job->title) }}">
                                    @error('title')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                            @livewire('job-store', ['selectedCategoryId' => old('category_id', $job->category_id), 'selectedSubcategoryId' => old('subcategory_id', $job->subcategory_id)])

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
                                    <label>{{ __('Employment Type*') }}</label>
                                    <select class="select" name="employment_type_id">
                                        <option value="">{{ __('Select Employment Type') }}</option>
                                        @foreach (getEmploymentTypes() as $employmentType)
                                        <option value="{{ $employmentType->id }}" {{ old('employment_type_id', $job->employment_type_id) == $employmentType->id ? 'selected' : '' }}>{{ $employmentType->translated_name }}</option>
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
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" name="phone" class="form-control" placeholder="99 999 99 99" id="phone" value="{{ old('phone', $job->phone) }}">
                                    @error('phone')
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
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ old('salary_to', $job->salary_to) }}" placeholder="Uzs">
                                    @error('salary_to')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address*') }}</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $job->address) }}" placeholder="{{ __('Enter address or select on map') }}">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Deadline') }}</label>
                                    <div class="input-group date" id="datetimepicker">
                                        <input type="datetime-local" name="deadline" class="form-control" placeholder="" value="{{ old('deadline', $job->deadline ? date('Y-m-d\TH:i', strtotime($job->deadline)) : '') }}">
                                        @error('deadline')
                                        <li style="color: red;">{{ $message }}</li>
                                        @enderror
                                        <span class="input-group-addon"></span>
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Leaflet Maps -->
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
                                        <small>{{ __('Latitude') }}: <span id="latDisplay">{{ $job->latitude ?? '-' }}</span> | {{ __('Longitude') }}: <span id="lngDisplay">{{ $job->longitude ?? '-' }}</span></small>
                                    </div>
                                    <!-- Hidden coordinates -->
                                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $job->latitude) }}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $job->longitude) }}">
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

                            <!-- Image Upload with existing images -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Upload Images') }}</label>

                                    <!-- Existing Images -->
                                    @if($job->images->count() > 0)
                                    <div class="existing-images mb-3">
                                        <h5>{{ __('Current Images') }}</h5>
                                        <div class="row">
                                            @foreach($job->images as $image)
                                            <div class="col-md-3 mb-3">
                                                <div class="image-item position-relative">
                                                    <img src="{{ asset('storage/jobs/' . $image->image_path) }}" alt="Job Image" class="img-fluid" style="height: 150px; object-fit: cover; border-radius: 8px;">
                                                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: 5px; right: 5px;" onclick="deleteImage({{ $image->id }})">
                                                        <i class="lni lni-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    <!-- New Images Upload -->
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
                                <button class="btn" type="submit">{{ __('Update Job') }}</button>
                                <a href="{{ route('profile.manage-jobs') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MAIN JAVASCRIPT - PAGE OXIRIDA -->
<script>
    // Edit mode da existing coordinates setup
    document.addEventListener('DOMContentLoaded', function() {
        const existingLat = {
            {
                $job - > latitude ?? 'null'
            }
        };
        const existingLng = {
            {
                $job - > longitude ?? 'null'
            }
        };

        // Map setup uchun kuting (main.js load bo'lguncha)
        setTimeout(() => {
            // Agar mavjud coordinates bor bo'lsa va map tayyor bo'lsa
            if (existingLat && existingLng && typeof map !== 'undefined' && map) {
                const location = L.latLng(existingLat, existingLng);

                // Mavjud marker bor bo'lsa o'chir
                if (typeof marker !== 'undefined' && marker) {
                    map.removeLayer(marker);
                }

                // Yangi marker qo'sh
                marker = L.marker(location, {
                    draggable: true
                }).addTo(map);

                // Map'ni center qil
                map.setView(location, 14);

                // Coordinates display'ni yangiyla
                if (typeof updateCoordinates === 'function') {
                    updateCoordinates(existingLat, existingLng);
                }

                // Drag event qo'sh
                marker.on('dragend', function(e) {
                    const position = marker.getLatLng();
                    updateCoordinates(position.lat, position.lng);
                    if (typeof reverseGeocode === 'function') {
                        reverseGeocode(position.lat, position.lng);
                    }
                });
            }
        }, 1000); // 1 sekund kutish - main.js load bo'lishi uchun
    });
</script>

<style>
    .existing-images img {
        border: 2px solid #ddd;
        transition: border-color 0.3s;
    }

    .existing-images .image-item:hover img {
        border-color: #007bff;
    }

    /* Upload area styling - CSS fayldan */
    .upload-area {
        border: 2px dashed #ddd;
        border-radius: 8px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.3s;
    }

    .upload-area:hover {
        border-color: #007bff;
    }

    .upload-area.drag-over {
        border-color: #007bff;
        background-color: #f8f9fa;
    }

    /* Image preview styling - CSS fayldan */
    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .image-preview-item {
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 8px;
        overflow: hidden;
        border: 2px solid #ddd;
    }

    .image-preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-preview-item .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: #ff4757;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

@endsection