@extends('layouts.admin.main')

@section('content')
<x-admin.breadcrumb :title="'Categories'">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="icon-plus"></i>
        Add Category
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-list text-primary"></i>
                        Categories Management
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col" width="200px" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @forelse ($categories as $category)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $i++ }}</th>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-medium">{{ $category->translated_name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-outline-primary"
                                                title="Edit">
                                                <i class="icon-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="icon-folder-open mb-3" style="font-size: 3rem;"></i>
                                            <h5>No categories found</h5>
                                            <p>Start by creating your first category</p>
                                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                                <i class="icon-plus me-2"></i>
                                                Create Category
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection