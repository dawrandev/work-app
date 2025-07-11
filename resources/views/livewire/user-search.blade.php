<div>
    <!-- Search Form -->
    <div class="card-header bg-white border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="icon-users text-primary"></i>
                Users Management
                <span class="badge bg-secondary ms-2">{{ $users->total() }} users</span>
            </h5>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text"
                            wire:model.live="search"
                            class="form-control"
                            placeholder="Search">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select wire:model.live="selectedRole" class="form-select">
                            <option value="">All Roles</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col" width="10%">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created At</th>
                        <th scope="col" width="200px" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = ($users->currentPage() - 1) * $users->perPage() + 1; @endphp
                    @forelse ($users as $user)
                    <tr>
                        <th scope="row" class="align-middle">{{ $i++ }}</th>
                        <td class="align-middle">
                            <div class="avatar avatar-sm">
                                @if($user->image && $user->image != 'user-icon')
                                <img src="{{ asset('storage/users/' . $user->image) }}"
                                    alt="{{ $user->first_name }}"
                                    class="rounded-circle"
                                    style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <span class="fw-medium">{{ $user->first_name }} {{ $user->last_name }}</span>
                            </div>
                        </td>
                        <td class="align-middle">
                            <span class="text-muted">+998 {{ $user->phone }}</span>
                        </td>
                        <td class="align-middle">
                            @if($user->role == 'admin')
                            <span class="badge bg-danger">Admin</span>
                            @else
                            <span class="badge bg-success">User</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <span class="text-muted">{{ $user->created_at->format('d M, Y') }}</span>
                        </td>
                        <td class="text-center align-middle">
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.users.show', ['locale' => app()->getLocale(), 'user' => $user->id ]) }}"
                                    class="btn btn-sm btn-outline-info"
                                    title="View">
                                    <i class="icon-eye"></i>
                                </a>
                                <button type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    title="Delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $user->id }}">
                                    <i class="icon-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="icon-trash text-danger me-2"></i>
                                        {{ __('Delete User') }}
                                    </h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-3">
                                        <i class="icon-alert-triangle text-warning" style="font-size: 3rem;"></i>
                                    </div>
                                    <p class="text-center">
                                        {{ __('Are you sure you want to delete this user?') }}
                                    </p>
                                    <div class="alert alert-warning" role="alert">
                                        <div class="mb-2">
                                            <strong>{{ __('User:') }}</strong> {{ $user->first_name }} {{ $user->last_name }}
                                        </div>
                                        <div>
                                            <strong>{{ __('Phone:') }}</strong> +998 {{ $user->phone }}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                        <i class="icon-x me-1"></i>
                                        {{ __('Cancel') }}
                                    </button>
                                    <form action="{{ route('admin.users.destroy', ['locale' => app()->getLocale(), 'user' => $user->id]) }}" method="POST" style="display: inline;">
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
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <i class="icon-users mb-3" style="font-size: 3rem;"></i>
                                <h5>No users found</h5>
                                @if($search || $selectedRole)
                                <p>No users match your search criteria</p>
                                <button wire:click="$set('search', ''); $set('selectedRole', '')" class="btn btn-outline-primary">
                                    Clear Search
                                </button>
                                @else
                                <p>Start by creating your first user</p>
                                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                                    <i class="icon-plus me-2"></i>
                                    Create User
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>