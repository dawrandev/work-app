@extends('layouts.admin.main')

@section('content')
<x-admin.breadcrumb :title="''">
    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary">
        <i class="icon-plus"></i>
        Add Subcategory
    </a>

</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-layers text-primary"></i>
                        Subcategories Management
                    </h5><br>
                    <div class="d-flex justify-content-between align-items-center mb-3 end">
                        <span class="text-muted">
                            Found: <strong>{{ $subcategories->total() }}</strong> subcategories
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Success Message --}}
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="icon-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    {{-- Filter Form --}}
                    <form method="GET" action="{{ route('admin.subcategories.index') }}" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="icon-search"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control"
                                        name="search"
                                        value="{{ request('search') }}"
                                        placeholder="Search subcategories...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="category_id">
                                    <option value="">All Categories</option>
                                    @foreach(getCategories() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->translated_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select" name="per_page">
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 per page</option>
                                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 per page</option>
                                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 per page</option>
                                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 per page</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-filter me-1"></i>
                                    Filter
                                </button>
                                @if(request()->hasAny(['search', 'category_id']))
                                <a href="{{ route('admin.subcategories.index') }}" class="btn btn-secondary ms-2">
                                    <i class="icon-x me-1"></i>
                                    Clear
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col">Subcategory Name</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col" width="200px" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = ($subcategories->currentPage() - 1) * $subcategories->perPage() + 1;
                                @endphp
                                @forelse ($subcategories as $subcategory)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $i++ }}</th>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-corner-down-right text-muted me-2"></i>
                                            <span class="fw-medium">{{ $subcategory->translated_name }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge" style="background-color: #dbeafe; color: #1e40af; border: 1px solid #93c5fd;">
                                            <i class="icon-folder me-1"></i>
                                            {{ $subcategory->category->translated_name }}
                                        </span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}"
                                                class="btn btn-sm btn-outline-primary"
                                                title="Edit">
                                                <i class="icon-pencil-alt"></i>
                                            </a>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $subcategory->id }}">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Delete Modal for each subcategory -->
                                <div class="modal fade" id="deleteModal{{ $subcategory->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="icon-trash text-danger me-2"></i>
                                                    {{ __('Delete Subcategory') }}
                                                </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <i class="icon-alert-triangle text-warning" style="font-size: 3rem;"></i>
                                                </div>
                                                <p class="text-center">
                                                    {{ __('Are you sure you want to delete this subcategory?') }}
                                                </p>
                                                <div class="alert alert-warning" role="alert">
                                                    <div class="mb-2">
                                                        <strong>{{ __('Subcategory:') }}</strong> {{ $subcategory->translated_name }}
                                                    </div>
                                                    <div>
                                                        <strong>{{ __('Parent Category:') }}</strong> {{ $subcategory->category->translated_name }}
                                                    </div>
                                                </div>
                                                <p class="text-muted small">
                                                    {{ __('This action cannot be undone. All data related to this subcategory will be permanently deleted.') }}
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                                    <i class="icon-x me-1"></i>
                                                    {{ __('Cancel') }}
                                                </button>
                                                <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="icon-trash me-1"></i>
                                                        {{ __('Yes, Delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted">
                                            @if(request()->hasAny(['search', 'category_id']))
                                            <i class="icon-search mb-3" style="font-size: 3rem;"></i>
                                            <h5>No results found</h5>
                                            <p>Try adjusting your search or filter criteria</p>
                                            <a href="{{ route('admin.subcategories.index') }}" class="btn btn-secondary">
                                                <i class="icon-x me-2"></i>
                                                Clear filters
                                            </a>
                                            @else
                                            <i class="icon-layers mb-3" style="font-size: 3rem;"></i>
                                            <h5>No subcategories found</h5>
                                            <p>Start by creating your first subcategory</p>
                                            <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary">
                                                <i class="icon-plus me-2"></i>
                                                Create Subcategory
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $subcategories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection