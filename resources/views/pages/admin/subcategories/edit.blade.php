@extends('layouts.admin.main')

@section('content')
<x-admin.breadcrumb :title="''">
    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
        <i class="icon-list"></i>
        {{ __('Subcategories list') }}
    </a>
</x-admin.breadcrumb>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i>
                        {{ __('Edit Category') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach(config('app.all_locales') as $locale => $language)
                        <div class="mb-3">
                            <label for="name_{{ $locale }}" class="form-label">
                                {{ __('Subcategory name') }} ({{ $language }})
                            </label>
                            <input
                                type="text"
                                name="name[{{ $locale }}]"
                                id="name_{{ $locale }}"
                                class="form-control @error('name.' . $locale) is-invalid @enderror"
                                value="{{ old('name.' . $locale, $subcategory->name[$locale] ?? '') }}"
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
                                <i class="bi bi-arrow-left"></i> {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection