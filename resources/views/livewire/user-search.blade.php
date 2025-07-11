<div>
    <!-- Search Form -->
    <div class="card-header bg-white border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="icon-users text-primary"></i>
                Users Management
                <span class="badge bg-secondary ms-2">{{ $users->total() }} users</span>
            </h5>

            <div class="input-group" style="width: 400px;">
                <input type="text"
                    wire:model.debounce.300ms="search"
                    class="form-control"
                    placeholder="Search">

                <select wire:model="roleFilter" class="form-select">
                    <option value="">All Roles</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

                @if($search || $roleFilter)
                <button wire:click="$set('search', ''); $set('roleFilter', '')" class="btn btn-outline-secondary">
                    <i class="icon-x"></i>
                </button>
                @endif
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
                    <?php $i = ($users->currentPage() - 1) * $users->perPage() + 1; ?>
                    @forelse ($users as $user)
                    <tr>
                        <th scope="row" class="align-middle">{{ $i++ }}</th>
                        <td class="align-middle">
                            <div class="avatar avatar-sm">
                                @if($user->image && $user->image != 'user-icon')
                                <img src="{{ asset('storage/' . $user->image) }}"
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
                                <a href="{{ route('admin.users.show', $user->id) }}"
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
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <i class="icon-users mb-3" style="font-size: 3rem;"></i>
                                <h5>No users found</h5>
                                @if($search || $roleFilter)
                                <p>No users match your search criteria</p>
                                <button wire:click="$set('search', ''); $set('roleFilter', '')" class="btn btn-outline-primary">
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

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>