@extends('layouts.admin.main')
@section('title', __('Create Subcategory'))
@section('content')
<x-admin.breadcrumb :title="__('Create Subcategory')">
    <a href="{{ route('admin.subcategories.index') }}" class="btn btn-primary">
        <i class="icon-list"></i>
        {{__('Subcategories List')}}
    </a>
</x-admin.breadcrumb>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-folder-plus me-2"></i>
                        {{__('Add Subcategory')}}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.subcategories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category_id" class="form-label">
                                {{__('Select Category')}}
                            </label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required>
                                <option value="">{{__('Choose a category')}}</option>
                                @foreach(getCategories() as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->translated_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Dynamic languages -->
                        @foreach(config('app.all_locales') as $locale => $language)
                        <div class="mb-3">
                            <label for="name_{{ $locale }}" class="form-label">
                                {{__('Subcategory Name')}} ({{ $language }})
                            </label>
                            <input
                                type="text"
                                name="name[{{ $locale }}]"
                                id="name_{{ $locale }}"
                                class="form-control @error('name.' . $locale) is-invalid @enderror"
                                value="{{ old('name')[$locale] ?? '' }}"
                                required>
                            @error('name.' . $locale)
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endforeach
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-plus-lg"></i> {{__('Add')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection