@extends('layouts.admin.main')
@section('title', __('Edit Category'))

@section('content')
<x-admin.breadcrumb :title="__('Edit Category')">
    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
        <i class="icon-list"></i>
        {{__('Categories List')}}
    </a>
</x-admin.breadcrumb>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i>
                        {{__('Edit Category')}}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Icon maydoni -->
                        <div class="mb-3">
                            <label for="icon" class="form-label">{{__('Icon')}}</label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    name="icon"
                                    id="icon"
                                    class="form-control @error('icon') is-invalid @enderror"
                                    value="{{ old('icon', $category->icon) }}"
                                    placeholder="lni lni-briefcase"
                                    required>
                                <a href="https://v2.lineicons.com/" target="_blank" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Choose icon from Line Icons')}}">
                                    <i class="bi bi-palette"></i> {{__('Choose Icon')}}
                                </a>
                            </div>
                            <div class="form-text">
                                <small class="text-muted">
                                    <i class="bi bi-info-circle"></i>
                                    {{__('Select an icon for this category')}}
                                </small>
                            </div>
                            @error('icon')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @foreach(config('app.all_locales') as $locale => $language)
                        <div class="mb-3">
                            <label for="name_{{ $locale }}" class="form-label">
                                {{__('Category Name')}} ({{ $language }})
                            </label>
                            <input
                                type="text"
                                name="name[{{ $locale }}]"
                                id="name_{{ $locale }}"
                                class="form-control @error('name.' . $locale) is-invalid @enderror"
                                value="{{ old('name.' . $locale, $category->name[$locale] ?? '') }}"
                                required>
                            @error('name.' . $locale)
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> {{__('Cancel')}}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> {{__('Update')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection