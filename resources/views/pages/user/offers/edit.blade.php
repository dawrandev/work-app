@extends('layouts.user.main')

@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

<x-user.breadcrumb :title="__('Edit Service')" :description="__('Edit your service')" :page="__('Edit Service')" />

<script>
    let imagesToDelete = [];
    let newImageFiles = [];
    const MAX_IMAGES = 3;

    function deleteImage(imageId) {
        if (!imagesToDelete.includes(imageId)) {
            imagesToDelete.push(imageId);
        }
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
        const form = document.getElementById('offerEditForm');
        const imageInput = document.getElementById('imageInput');
        imageInput.addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            const currentImages = document.querySelectorAll('.existing-images .col-md-3').length;
            const totalPossibleImages = currentImages + newImageFiles.length + files.length;
            if (totalPossibleImages > MAX_IMAGES) {
                const allowedCount = MAX_IMAGES - (currentImages + newImageFiles.length);
                alert(`Maksimal ${MAX_IMAGES} ta rasm yuklash mumkun. Siz ${allowedCount} ta rasm qo'sha olasiz.`);
                if (allowedCount > 0) {
                    newImageFiles.push(...files.slice(0, allowedCount));
                }
            } else {
                newImageFiles.push(...files);
            }
            updateImagePreview();
            updateImageCounts();
            e.target.value = '';
        });
        form.addEventListener('submit', function(e) {
            imagesToDelete.forEach(imageId => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'delete_images[]';
                hiddenInput.value = imageId;
                form.appendChild(hiddenInput);
            });
            const dataTransfer = new DataTransfer();
            newImageFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            imageInput.files = dataTransfer.files;
        });
        updateImageCounts();
    });
</script>

<section class="job-post section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="job-information">
                    <h3 class="title">{{ __('Edit Offer Information') }}</h3>
                    @auth
                    <div class="text-right mb-3" style="font-size: 1rem; font-weight: normal;">
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                    </div>
                    @endauth
                    <form action="{{ route('offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data" id="offerEditForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Profession Title') }}</label>
                                    <input class="form-control" name="title" type="text" value="{{ old('title', $offer->title) }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            @livewire('service-store', ['selectedCategoryId' => old('category_id', $offer->category_id), 'selectedSubcategoryId' => old('subcategory_id', $offer->subcategory_id)])

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Type') }}</label>
                                    <select class="select" name="type_id">
                                        <option value="">{{__('Select Type') }}</option>
                                        @foreach (getTypes() as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id', $offer->type_id) == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Employment Type') }}</label>
                                    <select class="select" name="employment_type_id">
                                        <option value="">{{ __('Select Employment Type') }}</option>
                                        @foreach (getEmploymentTypes() as $type)
                                        <option value="{{ $type->id }}" {{ old('employment_type_id', $offer->employment_type_id) == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('employment_type_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('District') }}</label>
                                    <select class="select" name="district_id">
                                        <option value="">{{ __('Select District') }}</option>
                                        @foreach (getDistricts() as $district)
                                        <option value="{{ $district->id }}" {{ old('district_id', $offer->district_id) == $district->id ? 'selected' : '' }}>{{ $district->translated_name }}</option>
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
                                    <input type="text" name="phone" class="form-control" placeholder="99 999 99 99" id="phone_edit" value="{{ old('phone', $offer->phone) }}">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary From') }}</label>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" placeholder="Uzs" value="{{ old('salary_from', $offer->salary_from) }}">
                                    @error('salary_from')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary To') }}</label>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ old('salary_to', $offer->salary_to) }}" placeholder="Uzs">
                                    @error('salary_to')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Location') }}</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $offer->address) }}" placeholder="{{ __('Enter address') }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Offer Status') }}</label>
                                    <select class="select" name="status">
                                        <option value="">{{ __('Select Status') }}</option>
                                        @foreach (statuses() as $key => $value)
                                        <option value="{{ $key }}" {{ old('status', $offer->status) == $key ? 'selected' : '' }}>{{ __($value) }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Description') }}</label>
                                    <div class="editor-container">
                                        <textarea name="description" id="description" class="form-control">{{ old('description', $offer->description) }}</textarea>
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
                                    @if($offer->images && count($offer->images) > 0)
                                    <div class="existing-images mb-3">
                                        <h5>{{ __('Current Images') }}</h5>
                                        <div class="row">
                                            @foreach($offer->images as $image)
                                            <div class="col-md-3 mb-3">
                                                <div class="image-item position-relative">
                                                    <img src="{{ asset('storage/offers/' . $image->image_path) }}" alt="Offer Image" class="img-fluid" style="height: 150px; object-fit: cover; border-radius: 8px;">
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
                                            <p>{{ __('Maximum 3 images total, 5MB per file') }}</p>
                                        </div>
                                        <input type="file" id="imageInput" name="images[]" multiple accept="image/*" style="display: none;">
                                        <div id="imagePreview" class="image-preview-container"></div>
                                    </div>
                                    @error('images')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">
                                        {{ __('You can upload up to 3 images in total. Delete existing images to upload new ones if needed.') }}
                                    </small>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 button">
                                <button class="btn" type="submit">{{ __('Update Offer') }}</button>
                                <a href="{{ route('offers.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .existing-images img {
        border: 2px solid #ddd;
        transition: border-color 0.3s;
    }

    .existing-images .image-item:hover img {
        border-color: #007bff;
    }

    /* Upload area styling */
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

    /* Image preview styling */
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
            placeholder: 'Offer tavsifini kiriting...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']]
            ]
        });
    });
</script>
@endpush