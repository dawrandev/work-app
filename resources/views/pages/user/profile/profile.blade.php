@php
$sectionClass = 'change-password';
@endphp

@extends('pages.user.profile.index')
<style>
    .profile-section {
        background: #f4f7fa;
        padding: 40px 0;
        min-height: 100vh;
    }

    .profile-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .profile-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px;
        text-align: center;
        position: relative;
    }

    .profile-avatar-container {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        object-fit: cover;
        display: block;
    }

    .upload-button {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background: white;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        border: 3px solid #667eea;
        color: #667eea;
        font-size: 18px;
    }

    .upload-button:hover {
        transform: scale(1.1);
        background: #667eea;
        color: white;
    }

    .profile-name {
        color: white;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .profile-role {
        color: rgba(255, 255, 255, 0.9);
        font-size: 16px;
        text-transform: capitalize;
    }

    .profile-body {
        padding: 40px;
    }

    .info-item {
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .info-label {
        font-size: 14px;
        color: #666;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .info-value {
        font-size: 16px;
        color: #333;
        font-weight: 600;
    }

    .edit-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .edit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    /* Edit Form Styles */
    .edit-form {
        display: none;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-size: 14px;
        color: #666;
        margin-bottom: 8px;
        display: block;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 12px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .button-group {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .btn-save {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-cancel {
        background: #e0e0e0;
        color: #666;
        border: none;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-cancel:hover {
        background: #d0d0d0;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
</style>

@section('profile-content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar-container">
                    <img src="{{ asset('storage/users/' . $user->image) }}" alt="Profile" class="profile-avatar" id="profileImage">
                    <label for="imageUpload" class="upload-button">
                        <i class="lni lni-camera"></i>
                    </label>
                </div>
                <form id="imageForm" action="{{ route('profile.update-image') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                    @csrf
                    <input type="file" id="imageUpload" name="image" accept="image/*" onchange="this.form.submit()">
                </form>
                <h2 class="profile-name">{{ $user->first_name }} {{ $user->last_name }}</h2>
                <p class="profile-role">{{ $user->role }}</p>
            </div>

            <div class="profile-body">
                <!-- View Mode -->
                <div id="viewMode">
                    <div class="info-item">
                        <div class="info-label">Ism</div>
                        <div class="info-value">{{ $user->first_name }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Familiya</div>
                        <div class="info-value">{{ $user->last_name }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Telefon raqam</div>
                        <div class="info-value">+998 {{ $user->phone }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Ro'yxatdan o'tgan sana</div>
                        <div class="info-value">{{ $user->created_at->format('d M, Y') }}</div>
                    </div>

                    <button class="edit-button" onclick="toggleEditMode()">
                        <i class="fas fa-edit"></i>
                        Ma'lumotlarni o'zgartirish
                    </button>
                </div>

                <!-- Edit Mode -->
                <div id="editMode" class="edit-form">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-label">Ism</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                            @error('first_name')
                            <li style="color: red;">{{ $message }}</li>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Familiya</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                            @error('last_name')
                            <li style="color: red;">{{ $message }}</li>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Telefon raqam</label>
                            <input type="number" name="phone" class="form-control" value="{{ $user->phone }}">
                            @error('phone')
                            <li style="color: red;">{{ $message }}</li>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Yangi parol (ixtiyoriy)</label>
                            <input type="password" name="password" class="form-control" placeholder="Yangi parol kiriting">
                            @error('password')
                            <li style="color: red;">{{ $message }}</li>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Parolni tasdiqlash</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Parolni qayta kiriting">
                            @error('password_confirmation')
                            <li style="color: red;">{{ $message }}</li>
                            @enderror
                        </div>

                        <div class="button-group">
                            <button type="submit" class="btn-save">
                                <i class="fas fa-save"></i>
                                Saqlash
                            </button>
                            <button type="button" class="btn-cancel" onclick="toggleEditMode()">
                                <i class="fas fa-times"></i>
                                Bekor qilish
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function toggleEditMode() {
        const viewMode = document.getElementById('viewMode');
        const editMode = document.getElementById('editMode');

        if (viewMode.style.display === 'none') {
            viewMode.style.display = 'block';
            editMode.style.display = 'none';
        } else {
            viewMode.style.display = 'none';
            editMode.style.display = 'block';
        }
    }

    // Preview image before upload
    document.getElementById('imageUpload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>