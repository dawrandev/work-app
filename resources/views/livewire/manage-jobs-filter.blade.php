<div>
    <!-- Filter Section -->
    <div class="job-filter-wrap bg-light rounded p-3 mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text"
                    wire:model.live="search"
                    class="form-control"
                    placeholder="{{ __('Search by job title...') }}">
            </div>
            <div class="col-md-3">
                <select wire:model.live="selectedCategory" class="form-control">
                    <option value="">{{ __('All Categories') }}</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->translated_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model.live="selectedDistrict" class="form-control">
                    <option value="">{{ __('All Districts') }}</option>
                    @foreach($districts as $dist)
                    <option value="{{ $dist->id }}">{{ $dist->translated_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model.live="selectedStatus" class="form-control">
                    <option value="">{{ __('All Status') }}</option>
                    @foreach (statuses() as $key => $value)
                    <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                        {{ __($value) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    <!-- Loading indicator -->
    <div wire:loading.delay class="text-center py-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Jobs Table -->
    <div class="job-items bg-white shadow-sm rounded">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th width="20%">{{ __('Job Title') }}</th>
                        <th width="12%">{{ __('Category') }}</th>
                        <th width="12%">{{ __('Location') }}</th>
                        <th width="8%">{{ __('Type') }}</th>
                        <th width="10%" class="text-center">{{ __('Status') }}</th>
                        <th width="10%" class="text-center">{{ __('Approval') }}</th>
                        <th width="8%" class="text-center">{{ __('Posted') }}</th>
                        <th width="15%" class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                    <tr>
                        <td class="text-center">
                            <span class="text-muted">{{ ($jobs->currentPage() - 1) * $jobs->perPage() + $loop->iteration }}</span>
                        </td>
                        <td>
                            <div class="job-title-wrap">
                                <h6 class="mb-1">
                                    <a href="{{ route('jobs.show', ['locale'=> app()->getLocale(), 'job' => $job->id]) }}" class="text-dark text-decoration-none">
                                        {{ $job->title }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="lni lni-eye"></i> {{ $job->unique_views_count ?? 0 }} views •
                                    <i class="lni lni-users"></i> {{ $job->applications_count ?? 0 }} applicants
                                </small>
                            </div>
                        </td>
                        <td>
                            <span class="badge" style="background-color: #0ea5e9; color: white;">
                                {{ $job->category->translated_name }}
                            </span>
                        </td>
                        <td>
                            <span class="text-muted">
                                <i class="lni lni-map-marker"></i> {{ $job->district->translated_name }}
                            </span>
                        </td>
                        <td>
                            @if($job->type->slug == 'full-time')
                            <span class="badge" style="background-color: #10b981; color: white;">{{ $job->type->translated_name }}</span>
                            @elseif($job->type->slug == 'part-time')
                            <span class="badge" style="background-color: #f59e0b; color: white;">{{ $job->type->translated_name }}</span>
                            @elseif($job->type->slug == 'contract')
                            <span class="badge" style="background-color: #8b5cf6; color: white;">{{ $job->type->translated_name }}</span>
                            @elseif($job->type->slug == 'freelance')
                            <span class="badge" style="background-color: #3b82f6; color: white;">{{ $job->type->translated_name }}</span>
                            @else
                            <span class="badge" style="background-color: #6b7280; color: white;">{{ $job->type->translated_name }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($job->status == 'active')
                            <span class="badge" style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-checkmark-circle"></i> {{ __('Active') }}
                            </span>
                            @elseif($job->status == 'paused')
                            <span class="badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-timer"></i> {{ __('Paused') }}
                            </span>
                            @elseif ($job->status = 'closed')
                            <span class="badge" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-ban"></i> {{ __('Closed') }}
                            </span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($job->approval_status == 'approved')
                            <span class="badge" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-checkmark"></i> {{ __('Approved') }}
                            </span>
                            @elseif($job->approval_status == 'rejected')
                            <span class="badge" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-close"></i> {{ __('Rejected') }}
                            </span>
                            @elseif($job->approval_status == 'pending')
                            <span class="badge" style="background: linear-gradient(135deg, #d97706 0%, #b45309 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-hourglass"></i> {{ __('Pending') }}
                            </span>
                            @else
                            <span class="badge" style="background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-question-circle"></i> {{ __('Unknown') }}
                            </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <small class="text-muted">{{ $job->created_at->format('d M, Y') }}</small>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('jobs.show',  ['locale'=> app()->getLocale(), 'job' => $job->id]) }}"
                                    class="btn btn-outline-primary"
                                    title="{{ __('View') }}">
                                    <i class="lni lni-eye"></i>
                                </a>
                                <a href="{{ route('jobs.edit',  ['locale'=> app()->getLocale(), 'job' => $job->id]) }}"
                                    class="btn btn-outline-warning"
                                    title="{{ __('Edit') }}">
                                    <i class="lni lni-pencil"></i>
                                </a>
                                <button type="button"
                                    class="btn btn-outline-danger"
                                    onclick="deleteJob({{ $job->id }}, '{{ $job->title }}')"
                                    title="{{ __('Delete') }}">
                                    <i class="lni lni-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5">
                            <div class="empty-content">
                                <i class="lni lni-briefcase" style="font-size: 3rem; color: #dee2e6;"></i>
                                <p class="mt-3 mb-1">{{ __('No jobs found') }}</p>
                                <p class="text-muted mb-4">{{ __('Try adjusting your filters or create a new job.') }}</p>
                                <a href="{{ route('jobs.create', app()->getLocale()) }}" class="btn btn-primary">
                                    <i class="lni lni-plus"></i> {{ __('Post New Job') }}
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if ($jobs->hasPages())
    <div class="pagination-wrapper mt-4">
        {{ $jobs->links() }}
    </div>
    @endif
</div>

<script>
    const locale = '{{ app()->getlocale() }}';

    function deleteJob(jobId, jobTitle) {
        Swal.fire({
            title: '{{ __("Are you sure?") }}',
            text: '{{ __("You want to delete this job:") }} ' + jobTitle,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '{{ __("Yes, delete it!") }}',
            cancelButtonText: '{{ __("Cancel") }}'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create form and submit
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '/' + locale + '/jobs/destroy/' + jobId;

                // CSRF token
                var csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Method field
                var methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>