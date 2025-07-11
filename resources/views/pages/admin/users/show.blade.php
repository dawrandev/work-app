@extends('layouts.admin.main')

@section('content')
<x-admin.breadcrumb :title="'User Details'">
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
        <i class="icon-arrow-left"></i>
        Back to List
    </a>
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-4">
                        @if($user->image && $user->image != 'user-icon')
                        <img src="{{ asset('storage/' . $user->image) }}"
                            alt="{{ $user->first_name }}"
                            class="rounded-circle shadow"
                            style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center shadow"
                            style="width: 150px; height: 150px; font-size: 3rem;">
                            {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                        </div>
                        @endif
                    </div>

                    <h4 class="mb-1">{{ $user->first_name }} {{ $user->last_name }}</h4>

                    <div class="mb-3">
                        @if($user->role == 'admin')
                        <span class="badge bg-danger fs-6">Administrator</span>
                        @else
                        <span class="badge bg-success fs-6">Regular User</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                            <i class="icon-pencil-alt me-1"></i>
                            Edit Profile
                        </a>
                        <button type="button"
                            class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $user->id }}">
                            <i class="icon-trash me-1"></i>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-info text-primary"></i>
                        User Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">{{ $user->first_name }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">{{ $user->last_name }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">Phone Number</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">
                                <i class="icon-phone text-success me-1"></i>
                                +998 {{ $user->phone }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">User Role</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0">
                                @if($user->role == 'admin')
                                <span class="badge bg-danger">Administrator</span>
                                @else
                                <span class="badge bg-success">Regular User</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">Account Created</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">
                                <i class="icon-calendar text-info me-1"></i>
                                {{ $user->created_at->format('d F, Y - H:i') }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h6 class="text-muted mb-0">Last Updated</h6>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0 fw-medium">
                                <i class="icon-refresh-cw text-warning me-1"></i>
                                {{ $user->updated_at->format('d F, Y - H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="icon-activity text-primary"></i>
                        Account Statistics
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="p-3 border rounded">
                                <i class="icon-clock text-info mb-2" style="font-size: 2rem;"></i>
                                <h6 class="text-muted mb-1">Account Age</h6>
                                <h4 class="mb-0">{{ $user->created_at->diffForHumans() }}</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 border rounded">
                                <i class="icon-shield text-success mb-2" style="font-size: 2rem;"></i>
                                <h6 class="text-muted mb-1">Account Status</h6>
                                <h4 class="mb-0 text-success">Active</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 border rounded">
                                <i class="icon-user-check text-primary mb-2" style="font-size: 2rem;"></i>
                                <h6 class="text-muted mb-1">User ID</h6>
                                <h4 class="mb-0">#{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection