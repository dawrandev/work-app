@extends('layouts.user.main')

@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

<x-user.breadcrumb :title="__('Edit Job')" :description="__('Update your job information to attract the best talent.')" :page="__('Edit Job')" />
<script>
    let imagesToDelete = [];
    let newImageFiles = []; // Track new images
    const MAX_IMAGES = 3;

    function deleteImage(imageId) {
        if (!imagesToDelete.includes(imageId)) {
            imagesToDelete.push(imageId);
        }

        // DOM'dan image'ni o'chir (visual effect)
        const imageContainer = event.target.closest('.col-md-3');
        if (imageContainer) {
            imageContainer.style.transition = 'opacity 0.3s ease';
            imageContainer.style.opacity = '0';
            setTimeout(() => {
                imageContainer.remove();
                updateImageCounts();
            }, 300);
        }
    }

    function updateImageCounts() {
        const currentImages = document.querySelectorAll('.existing-images .col-md-3').length;
        const newImages = newImageFiles.length;
        const totalImages = currentImages + newImages;

        // Update UI to show current status
        const statusElement = document.getElementById('imageCountStatus');
        if (statusElement) {
            statusElement.textContent = `${totalImages}/3 images`;

            if (totalImages >= MAX_IMAGES) {
                statusElement.classList.add('text-warning');
                document.getElementById('fileUploadArea').style.display = 'none';
            } else {
                statusElement.classList.remove('text-warning');
                document.getElementById('fileUploadArea').style.display = 'block';
            }
        }
    }

    function removeNewImage(index) {
        newImageFiles.splice(index, 1);
        updateImagePreview();
        updateImageCounts();
    }

    function updateImagePreview() {
        const previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = '';

        newImageFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'image-preview-item';
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button type="button" class="remove-btn" onclick="removeNewImage(${index})">×</button>
                `;
                previewContainer.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('jobEditForm');
        const imageInput = document.getElementById('imageInput');

        // Handle new image selection
        imageInput.addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            const currentImages = document.querySelectorAll('.existing-images .col-md-3').length;
            const totalPossibleImages = currentImages + newImageFiles.length + files.length;

            if (totalPossibleImages > MAX_IMAGES) {
                const allowedCount = MAX_IMAGES - (currentImages + newImageFiles.length);
                alert(`{{ __('Maximum 3 images can be uploaded. You can add :count images.', ['count' => '']) }}`.replace(':count', allowedCount));

                // Only add allowed number of files
                if (allowedCount > 0) {
                    newImageFiles.push(...files.slice(0, allowedCount));
                }
            } else {
                newImageFiles.push(...files);
            }

            updateImagePreview();
            updateImageCounts();

            // Clear the input
            e.target.value = '';
        });

        form.addEventListener('submit', function(e) {
            console.log('=== FORM SUBMISSION ===');

            // Add deleted images to form
            imagesToDelete.forEach(imageId => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'delete_images[]';
                hiddenInput.value = imageId;
                form.appendChild(hiddenInput);
            });

            // Update file input with new images
            const dataTransfer = new DataTransfer();
            newImageFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            imageInput.files = dataTransfer.files;

            const subcategorySelect = document.querySelector('select[name="subcategory_id"]');
            console.log('Selected subcategory:', subcategorySelect.value);

            console.log('Latitude:', document.getElementById('latitude').value);
            console.log('Longitude:', document.getElementById('longitude').value);
            console.log('Images to delete:', imagesToDelete);
            console.log('New images count:', newImageFiles.length);
        });

        // Initial count update
        updateImageCounts();
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
                                    <div class="text-danger">{{ $message }}</div>
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
                                    <div class="text-danger">{{ $message }}</div>
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
                                    <div class="text-danger">{{ $message }}</div>
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
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" name="phone" class="form-control" placeholder="{{ __('99 999 99 99') }}" id="phone_edit" value="{{ old('phone', $job->phone) }}">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary From') }}</label>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" placeholder="{{ __('Uzs') }}" value="{{ old('salary_from', $job->salary_from) }}">
                                    @error('salary_from')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary To') }}</label>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ old('salary_to', $job->salary_to) }}" placeholder="{{ __('Uzs') }}">
                                    @error('salary_to')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address*') }}</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $job->address) }}" placeholder="{{ __('Enter address or select on map') }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Deadline') }}</label>
                                    <div class="input-group date" id="datetimepicker">
                                        <input type="datetime-local" name="deadline" class="form-control" placeholder="" value="{{ old('deadline', $job->deadline ? date('Y-m-d\TH:i', strtotime($job->deadline)) : '') }}">
                                        @error('deadline')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <span class="input-group-addon"></span>
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Job Status') }}</label>
                                    <select class="select" name="status">
                                        <option value="">{{ __('Select Status') }}</option>
                                        @foreach (statuses() as $key => $value)
                                        <option value="{{ $key }}" {{ old('status', $job->status) == $key ? 'selected' : '' }}>{{ __($value) }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Leaflet Maps -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Select Location on Map') }}</label>
                                    <div id="map" style="height: 400px; border-radius: 8px; overflow: hidden; z-index: 1;"></div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-warning" onclick="clearLocation()">
                                            <i class="lni lni-trash"></i> {{ __('Clear') }}
                                        </button>
                                    </div>
                                    <!-- Hidden coordinates -->
                                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $job->latitude) }}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $job->longitude) }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job Description*') }}</label>
                                    <div class="editor-container">
                                        <textarea name="description" id="description" class="form-control">{{ old('description', $job->description) }}</textarea>
                                    </div>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image Upload with existing images -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Upload Images') }} <span id="imageCountStatus" class="badge badge-info"></span></label>

                                    <!-- Existing Images -->
                                    @if($job->images->count() > 0)
                                    <div class="existing-images mb-3">
                                        <h5>{{ __('Current Images') }}</h5>
                                        <div class="row">
                                            @foreach($job->images as $image)
                                            <div class="col-md-3 mb-3">
                                                <div class="image-item position-relative">
                                                    <img src="{{ asset('storage/jobs/' . $image->image_path) }}" alt="{{ __('Job Image') }}" class="img-fluid" style="height: 150px; object-fit: cover; border-radius: 8px;">
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
                                            <p>{{ __('Maximum 3 images total, 2MB per file') }}</p>
                                        </div>
                                        <input type="file" id="imageInput" name="images[]" multiple accept="image/*" style="display: none;">
                                        <div id="imagePreview" class="image-preview-container"></div>
                                    </div>
                                    @error('images')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Instructions -->
                                    <small class="text-muted">
                                        {{ __('You can upload up to 3 images in total. Delete existing images to upload new ones if needed.') }}
                                    </small>
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
    // Map o'zgaruvchilarini global qilish
    let map, marker;

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

        // Map container mavjudligini tekshirish
        const mapContainer = document.getElementById('map');
        if (!mapContainer) {
            console.error('{{ __('
                Map container not found ') }}');
            return;
        }

        // Map initialization
        try {
            // Default location (Nukus)
            const defaultLocation = [42.4611, 59.6166];
            const initialLocation = (existingLat && existingLng) ? [existingLat, existingLng] :
                defaultLocation;

            // Initialize map
            map = L.map('map').setView(initialLocation, 12);

            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Map click event
            map.on('click', function(e) {
                placeMarker(e.latlng);
                updateCoordinates(e.latlng.lat, e.latlng.lng);
                reverseGeocode(e.latlng.lat, e.latlng.lng);
            });

            // Agar coordinates mavjud bo'lsa, marker qo'sh
            if (existingLat && existingLng) {
                placeMarker(L.latLng(existingLat, existingLng));
                updateCoordinates(existingLat, existingLng);
            }
        } catch (error) {
            console.error('{{ __('
                Map initialization error ') }}:', error);
        }
    });

    // Place marker function
    function placeMarker(location) {
        if (marker) {
            marker.setLatLng(location);
        } else {
            marker = L.marker(location, {
                draggable: true
            }).addTo(map);

            marker.on('dragend', function(e) {
                const position = marker.getLatLng();
                updateCoordinates(position.lat, position.lng);
                reverseGeocode(position.lat, position.lng);
            });
        }
        map.setView(location, 14);
    }

    // Update coordinates function
    function updateCoordinates(lat, lng) {
        document.getElementById('latitude').value = lat.toFixed(8);
        document.getElementById('longitude').value = lng.toFixed(8);
        document.getElementById('latDisplay').textContent = lat.toFixed(6);
        document.getElementById('lngDisplay').textContent = lng.toFixed(6);
    }

    // Reverse geocode function
    function reverseGeocode(lat, lng) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&accept-language=uz`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    document.getElementById('address').value = data.display_name;
                }
            })
            .catch(error => console.error('{{ __('
                Reverse geocoding error ') }}:', error));
    }

    // getCurrentLocation, searchAddress, clearLocation funksiyalari main.js'dan keladi
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

@push('js')
<script src="{{ asset('assets/user/js/summernote-lite.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: '{{ __('
            Enter job description...') }}',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']]
            ]
        });
    });

    L.Icon.Default.mergeOptions({
        iconUrl: '/assets/user/images/leaflet/marker-icon.png',
        iconRetinaUrl: '/assets/user/images/leaflet/marker-icon-2x.png',
        shadowUrl: '/assets/user/images/leaflet/marker-shadow.png'
    });
</script>
@endpush