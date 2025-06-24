@extends('layouts.user.main')

@section('content')
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

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Address*') }}</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" placeholder="{{ __('Enter address or select on map') }}">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job Description*') }}</label>
                                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
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

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<style>
    /* Custom File Upload Styles */
    .custom-file-upload {
        margin: 10px 0;
    }

    .upload-area {
        border: 2px dashed #007bff;
        border-radius: 8px;
        background: #f8f9fa;
        text-align: center;
        padding: 40px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .upload-area:hover {
        border-color: #0056b3;
        background: #e9ecef;
    }

    .upload-area.drag-over {
        border-color: #28a745;
        background: #d4edda;
    }

    .upload-area i {
        font-size: 48px;
        color: #007bff;
        margin-bottom: 20px;
        display: block;
    }

    .upload-area h4 {
        color: #495057;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .upload-area p {
        color: #6c757d;
        font-size: 14px;
        margin: 0;
    }

    /* Image Preview Styles */
    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .image-preview-item {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        cursor: pointer;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    .image-preview-item .remove-btn:hover {
        background: #c82333;
    }

    /* Map styling */
    #map {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .coordinates-info {
        background: #f8f9fa;
        padding: 8px 12px;
        border-radius: 4px;
        display: inline-block;
    }

    /* Leaflet popup */
    .leaflet-popup-content {
        margin: 10px;
    }
</style>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Leaflet Map variables
    let map, marker;
    let uploadedFiles = [];

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Leaflet Map
        initMap();

        // File upload handling
        setupFileUpload();
    });

    // Leaflet Map functions
    function initMap() {
        // Tashkent coordinates
        const defaultLocation = [41.2995, 69.2401];

        // Initialize map
        map = L.map('map').setView(defaultLocation, 12);

        // Add tile layer (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Map click event
        map.on('click', function(e) {
            placeMarker(e.latlng);
            updateCoordinates(e.latlng.lat, e.latlng.lng);
            reverseGeocode(e.latlng.lat, e.latlng.lng);
        });

        // Check for old values
        const oldLat = document.getElementById('latitude').value;
        const oldLng = document.getElementById('longitude').value;

        if (oldLat && oldLng) {
            const location = L.latLng(parseFloat(oldLat), parseFloat(oldLng));
            placeMarker(location);
            updateCoordinates(parseFloat(oldLat), parseFloat(oldLng));
        }
    }

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

    function updateCoordinates(lat, lng) {
        document.getElementById('latitude').value = lat.toFixed(8);
        document.getElementById('longitude').value = lng.toFixed(8);
        document.getElementById('latDisplay').textContent = lat.toFixed(6);
        document.getElementById('lngDisplay').textContent = lng.toFixed(6);
    }

    function reverseGeocode(lat, lng) {
        // Using Nominatim for reverse geocoding
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&accept-language=uz`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    document.getElementById('address').value = data.display_name;
                }
            })
            .catch(error => console.error('Reverse geocoding error:', error));
    }

    function searchAddress() {
        const address = document.getElementById('address').value;

        if (!address) {
            alert('{{ __("Please enter an address") }}');
            return;
        }

        // Using Nominatim for geocoding
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}&countrycodes=uz&limit=1`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    const result = data[0];
                    const location = L.latLng(parseFloat(result.lat), parseFloat(result.lon));
                    placeMarker(location);
                    updateCoordinates(parseFloat(result.lat), parseFloat(result.lon));
                    document.getElementById('address').value = result.display_name;
                } else {
                    alert('{{ __("Address not found") }}');
                }
            })
            .catch(error => {
                console.error('Geocoding error:', error);
                alert('{{ __("Error searching address") }}');
            });
    }

    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const location = L.latLng(position.coords.latitude, position.coords.longitude);
                    placeMarker(location);
                    updateCoordinates(position.coords.latitude, position.coords.longitude);
                    reverseGeocode(position.coords.latitude, position.coords.longitude);
                },
                function(error) {
                    alert('{{ __("Error getting location") }}: ' + error.message);
                }
            );
        } else {
            alert('{{ __("Geolocation not supported") }}');
        }
    }

    function clearLocation() {
        if (marker) {
            map.removeLayer(marker);
            marker = null;
        }
        document.getElementById('latitude').value = '';
        document.getElementById('longitude').value = '';
        document.getElementById('address').value = '';
        document.getElementById('latDisplay').textContent = '-';
        document.getElementById('lngDisplay').textContent = '-';
    }

    // File Upload Functions
    function setupFileUpload() {
        const uploadArea = document.querySelector('.upload-area');
        const fileInput = document.getElementById('imageInput');
        const previewContainer = document.getElementById('imagePreview');

        // Click to upload
        fileInput.addEventListener('change', handleFiles);

        // Drag and drop
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('drag-over');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('drag-over');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('drag-over');

            const files = e.dataTransfer.files;
            handleFilesArray(Array.from(files));
        });
    }

    function handleFiles(e) {
        const files = Array.from(e.target.files);
        handleFilesArray(files);
    }

    function handleFilesArray(files) {
        const imageFiles = files.filter(file => file.type.startsWith('image/'));

        imageFiles.forEach(file => {
            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                alert(`${file.name} is too large. Maximum size is 5MB`);
                return;
            }

            uploadedFiles.push(file);
            displayPreview(file);
        });

        updateFileInput();
    }

    function displayPreview(file) {
        const reader = new FileReader();
        const previewContainer = document.getElementById('imagePreview');

        reader.onload = function(e) {
            const previewItem = document.createElement('div');
            previewItem.className = 'image-preview-item';
            previewItem.innerHTML = `
                <img src="${e.target.result}" alt="${file.name}">
                <button type="button" class="remove-btn" onclick="removeImage('${file.name}')">×</button>
            `;
            previewContainer.appendChild(previewItem);
        };

        reader.readAsDataURL(file);
    }

    function removeImage(fileName) {
        uploadedFiles = uploadedFiles.filter(file => file.name !== fileName);
        updateFileInput();

        // Update preview
        const previewContainer = document.getElementById('imagePreview');
        const previewItems = previewContainer.querySelectorAll('.image-preview-item');
        previewItems.forEach(item => {
            const img = item.querySelector('img');
            if (img.alt === fileName) {
                item.remove();
            }
        });
    }

    function updateFileInput() {
        const fileInput = document.getElementById('imageInput');
        const dataTransfer = new DataTransfer();

        uploadedFiles.forEach(file => {
            dataTransfer.items.add(file);
        });

        fileInput.files = dataTransfer.files;
    }
</script>
@endsection