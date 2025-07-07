@php
$sectionClass = 'manage-jobs';
@endphp
@extends('pages.user.profile.index')

@section('profile-content')
<div class="row">
    <div class="col-12">
        <!-- Page Header with Button -->
        <div class="page-header-content mb-4">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <h3 class="page-title">{{ __('Saved Jobs') }}</h3>
                    <p class="text-muted mb-0">{{ __('') }}</p>
                </div>
            </div>
        </div>

        <div class="job-items bg-white shadow-sm rounded">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="5%" class="text-center">#</th>
                            <th width="25%">{{ __('Job Title') }}</th>
                            <th width="15%">{{ __('Category') }}</th>
                            <th width="15%">{{ __('Location') }}</th>
                            <th width="10%">{{ __('Type') }}</th>
                            <th width="10%" class="text-center">{{ __('Status') }}</th>
                            <th width="10%" class="text-center">{{ __('Posted') }}</th>
                            <th width="10%" class="text-center">{{ __('Actions') }}</th>
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
                                        <a href="{{ route('jobs.show', $job->id) }}" class="text-dark text-decoration-none">
                                            {{ $job->title }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        <i class="lni lni-eye"></i> {{ $job->views ?? 0 }} views •
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
                                @elseif($job->status == 'inactive')
                                <span class="badge" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-close"></i> {{ __('Inactive') }}
                                </span>
                                @elseif($job->status == 'pending')
                                <span class="badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-timer"></i> {{ __('Pending') }}
                                </span>
                                @else
                                <span class="badge" style="background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-ban"></i> {{ __('Expired') }}
                                </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <small class="text-muted">{{ $job->created_at->format('d M, Y') }}</small>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('jobs.show', $job->id) }}"
                                        class="btn btn-outline-primary"
                                        title="{{ __('View') }}">
                                        <i class="lni lni-eye"></i>
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
                            <td colspan="8" class="text-center py-5">
                                <div class="empty-content">
                                    <i class="lni lni-briefcase" style="font-size: 3rem; color: #dee2e6;"></i>
                                    <p class="mt-3 mb-1">{{ __('No jobs found') }}</p>
                                    <a href="{{ route('jobs.index') }}" class="btn btn-primary">
                                        <i class="lni lni-plus"></i> {{ __('Browse Jobs') }}
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
</div>


<script>
    const locale = '{{ app()->getlocale() }}';

    function deleteJob(jobId, jobTitle) {
        Swal.fire({
            title: '{{ __("Are you sure?") }}',
            text: '{{ __("You want to delete this job?") }} ',
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
                form.action = '/' + locale + '/save-jobs/destroy/' + jobId;

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
@endsection