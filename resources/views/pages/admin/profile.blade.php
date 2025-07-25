@extends('layouts.admin.main')

@section('title', __('Profile'))

@section('content')
<div class="container-fluid">
    <!-- Filter Section -->
    <div class="card-body">
        <div class="row">
            <!-- Profile Image Card -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3 position-relative">
                            <img src="{{ auth()->user()->image && auth()->user()->image != 'user-icon' 
                                ? asset('storage/users/' . auth()->user()->image) 
                                : 'https://via.placeholder.com/150x150/007bff/ffffff?text=' . substr(auth()->user()->first_name, 0, 1) . substr(auth()->user()->last_name, 0, 1) }}"
                                alt="{{ __('Profile Image') }}"
                                class="rounded-circle img-fluid"
                                style="width: 150px; height: 150px; object-fit: cover;"
                                id="profileImagePreview">
                        </div>
                        <h5 class="card-title mb-1">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                        <p class="text-muted mb-3">{{ ucfirst(auth()->user()->role) }}</p>

                        <!-- Separate form for image upload -->
                        <form id="imageUploadForm" action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="first_name" value="{{ auth()->user()->first_name }}">
                            <input type="hidden" name="last_name" value="{{ auth()->user()->last_name }}">
                            <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
                            <input type="file" id="profileImageInput" name="image" accept="image/*">
                        </form>

                        <div class="mb-3">
                            <label for="profileImageInput" class="btn btn-outline-primary btn-sm" style="cursor: pointer;">
                                <i class="fa fa-camera"></i>
                                {{ __('Change Photo') }}
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="card shadow-sm mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Account Info') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">{{ __('Role') }}:</span>
                            <span class="badge bg-{{ auth()->user()->role == 'admin' ? 'success' : 'primary' }}">
                                {{ ucfirst(auth()->user()->role) }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">{{ __('Member Since') }}:</span>
                            <span>{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">{{ __('Last Updated') }}:</span>
                            <span>{{ auth()->user()->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Personal Information') }}</h6>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" action="{{ route('admin.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name" name="first_name"
                                        value="{{ old('first_name', auth()->user()->first_name) }}" required>
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name"
                                        value="{{ old('last_name', auth()->user()->last_name) }}" required>
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone"
                                        value="{{ old('phone', auth()->user()->phone) }}" required>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="role" class="form-label">{{ __('Role') }}</label>
                                    <select class="form-select" id="role" name="role" disabled>
                                        <option value="admin" {{ auth()->user()->role == 'admin' ? 'selected' : '' }}>{{ __('Administrator') }}</option>
                                        <option value="user" {{ auth()->user()->role == 'user' ? 'selected' : '' }}>{{ __('User') }}</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h6 class="mb-3">{{ __('Change Password') }}</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                        id="current_password" name="current_password">
                                    @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="new_password" name="password">
                                    <div class="form-text">{{ __('Leave blank if you don\'t want to change password.') }}</div>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">{{ __('Confirm New Password') }}</label>
                                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-times me-1"></i>
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i>
                                    {{ __('Save Changes') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Profile image upload with auto-submit
    document.getElementById('profileImageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Preview the image
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);

            // Auto-submit the form
            document.getElementById('imageUploadForm').submit();
        }
    });

    // Form validation
    document.getElementById('profileForm').addEventListener('submit', function(e) {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const currentPassword = document.getElementById('current_password').value;

        // Password validation
        if (newPassword) {
            if (!currentPassword) {
                e.preventDefault();
                document.getElementById('current_password').classList.add('is-invalid');
                document.getElementById('current_password').focus();
                return;
            }

            if (newPassword !== confirmPassword) {
                e.preventDefault();
                document.getElementById('confirm_password').classList.add('is-invalid');
                document.getElementById('confirm_password').focus();
                return;
            }
        }

        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>{{ __("Saving...") }}';
        submitBtn.disabled = true;
    });

    // Phone number formatting
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 12) {
            value = value.slice(0, 12);
        }
        e.target.value = value;
    });

    // Remove validation errors on input
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    });
</script>
@endpush
@endsection