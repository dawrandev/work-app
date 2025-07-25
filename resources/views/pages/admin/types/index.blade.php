@extends('layouts.admin.main')
@section('title', __('All Types'))
@section('content')
<x-admin.breadcrumb :title="__('Types')">
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary">
        <i class="icon-plus"></i>
        {{__('Add Type')}}
    </a>
</x-admin.breadcrumb>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-list text-primary"></i>
                        {{__('Types Management')}}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col">{{__('Type Name')}}</th>
                                    <th scope="col" width="200px" class="text-center">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @forelse ($types as $type)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $i++ }}</th>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-medium">{{ $type->translated_name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.types.edit', $type->id) }}"
                                                class="btn btn-sm btn-outline-primary"
                                                title="{{__('Edit')}}">
                                                <i class="icon-pencil-alt"></i>
                                            </a>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                title="{{__('Delete')}}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $type->id }}">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Delete Modal for each type -->
                                <div class="modal fade" id="deleteModal{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $type->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $type->id }}">
                                                    <i class="icon-trash text-danger me-2"></i>
                                                    {{ __('Delete Type') }}
                                                </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="{{__('Close')}}"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <i class="icon-alert-triangle text-warning" style="font-size: 3rem;"></i>
                                                </div>
                                                <p class="text-center">
                                                    {{ __('Are you sure you want to delete this type?') }}
                                                </p>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>{{ __('Type:') }}</strong> {{ $type->translated_name }}
                                                </div>
                                                <p class="text-muted small">
                                                    {{ __('This action cannot be undone. All data related to this type will be permanently deleted.') }}
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                                    <i class="icon-x me-1"></i>
                                                    {{ __('Cancel') }}
                                                </button>
                                                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display: inline;">
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
                                    <td colspan="3" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="icon-folder-open mb-3" style="font-size: 3rem;"></i>
                                            <h5>{{__('No types found')}}</h5>
                                            <p>{{__('Start by creating your first type')}}</p>
                                            <a href="{{ route('admin.types.create') }}" class="btn btn-primary">
                                                <i class="icon-plus me-2"></i>
                                                {{__('Create Type')}}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $types->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection