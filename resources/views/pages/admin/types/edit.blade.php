@extends('layouts.admin.main')
@section('title', __('Edit Type'))
@section('content')
<x-admin.breadcrumb :title="__('Edit Type')">
    <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">
        <i class="icon-arrow-left"></i>
        {{__('Back to Types')}}
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-edit text-primary"></i>
                        {{__('Edit Type')}}: {{ $type->translated_name }}
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name_uz" class="form-label">{{ __('Uzbek Name') }} <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name.uz') is-invalid @enderror"
                                        id="name_uz"
                                        name="name[uz]"
                                        value="{{ old('name.uz', $type->name['uz'] ?? '') }}"
                                        placeholder="{{ __('Enter Uzbek name') }}"
                                        required>
                                    @error('name.uz')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name_kaa" class="form-label">{{ __('Karakalpak Name') }} <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name.kaa') is-invalid @enderror"
                                        id="name_kaa"
                                        name="name[kaa]"
                                        value="{{ old('name.kaa', $type->name['kaa'] ?? '') }}"
                                        placeholder="{{ __('Enter Karakalpak name') }}"
                                        required>
                                    @error('name.kaa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name_ru" class="form-label">{{ __('Russian Name') }} <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name.ru') is-invalid @enderror"
                                        id="name_ru"
                                        name="name[ru]"
                                        value="{{ old('name.ru', $type->name['ru'] ?? '') }}"
                                        placeholder="{{ __('Enter Russian name') }}"
                                        required>
                                    @error('name.ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">
                                        <i class="icon-x me-1"></i>
                                        {{ __('Cancel') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="icon-save me-1"></i>
                                        {{ __('Update Type') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection