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
                    <h3 class="page-title">{{ __('Applicants') }}</h3>
                    <p class="text-muted mb-0">{{ __('Respond to applicants') }}</p>
                </div>
            </div>
        </div>

        <div class="job-items bg-white shadow-sm rounded">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="4%" class="text-center">#</th>
                            <th width="8%" class="text-center">{{ __('Photo') }}</th>
                            <th width="14%">{{ __('First Name') }}</th>
                            <th width="14%">{{ __('Last Name') }}</th>
                            <th width="14%">{{ __('Phone') }}</th>
                            <th width="13%" class="text-center">{{ __('Status') }}</th>
                            <th width="13%" class="text-center">{{ __('Approved Status') }}</th>
                            <th width="13%" class="text-center">{{ __('Applied') }}</th>
                            <th width="17%" class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applicants as $applicant)
                        <tr>
                            <td class="text-center">
                                <span class="text-muted">{{ ($applicants->currentPage() - 1) * $applicants->perPage() + $loop->iteration }}</span>
                            </td>
                            <td class="text-center">
                                <img src="{{ $applicant->image ? asset('storage/users/' . $applicant->image) : asset('assets/user/images/default-user.png') }}" alt="{{ $applicant->first_name }}" class="rounded-circle shadow" style="width: 48px; height: 48px; object-fit: cover; border: 2px solid #e5e7eb;">
                            </td>
                            <td>
                                <a href="{{ route('jobs.show', ['job' => $applicant->job_id]) }}" class="text-dark text-decoration-none">
                                    {{ $applicant->first_name }}
                                </a>
                            </td>
                            <td> <a href="{{ route('jobs.show', ['job' => $applicant->job_id]) }}" class="text-dark text-decoration-none">
                                    {{ $applicant->last_name }}
                                </a></td>
                            <td> <a href="{{ route('jobs.show', ['job' => $applicant->job_id]) }}" class="text-dark text-decoration-none">
                                    {{ $applicant->phone }}
                                </a></td>
                            <td class="text-center">
                                @if($applicant->job_status == 'active')
                                <span class="badge" style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); color: white; padding: 6px 12px;">{{ __('Active')}}</span>
                                @elseif($applicant->job_status == 'paused')
                                <span class="badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; padding: 6px 12px;">{{ __('Paused')}}</span>
                                @elseif($applicant->job_status == 'closed')
                                <span class="badge" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 6px 12px;">{{ __('Closed')}}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($applicant->approval_status == 'approved')
                                <span class="badge" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-checkmark"></i> {{ __('Approved') }}
                                </span>
                                @elseif($applicant->approval_status == 'rejected')
                                <span class="badge" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-close"></i> {{ __('Rejected') }}
                                </span>
                                @elseif($applicant->approval_status == 'pending')
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
                                <small class="text-muted">{{ \Carbon\Carbon::parse($applicant->applied_at)->format('d M, Y') }}</small>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    {{-- Cover letter modal --}}
                                    <button type="button"
                                        class="btn btn-outline-primary rounded-start"
                                        data-toggle="modal"
                                        data-target="#coverLetterModal{{ $loop->iteration }}"
                                        title="{{ __('View Cover Letter') }}">
                                        <i class="lni lni-envelope"></i>
                                    </button>

                                    {{-- Reject button --}}
                                    <form action="{{ route('offer-applies.respond', $applicant->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-outline-danger" title="{{ __('Reject') }}">
                                            <i class="lni lni-close"></i>
                                        </button>
                                    </form>

                                    {{-- Accept button --}}
                                    <form action="{{ route('offer-applies.respond', $applicant->id) }}" method="POST" style="display: inline;" class="ms-1">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-outline-success" title="{{ __('Approved') }}">
                                            <i class="lni lni-checkmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="empty-content">
                                    <i class="lni lni-briefcase" style="font-size: 3rem; color: #dee2e6;"></i>
                                    <p class="mt-3 mb-1">{{ __('No applicants found') }}</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if ($applicants->hasPages())
        <div class="pagination-wrapper mt-4">
            {{ $applicants->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Cover Letter Modals -->
@foreach ($applicants as $applicant)
<div class="modal fade form-modal" id="coverLetterModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="coverLetterModalLabel{{ $loop->iteration }}" aria-hidden="true">
    <div class="modal-dialog max-width-px-840 position-relative">
        <div class="modal-content">
            <button type="button"
                class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
                data-dismiss="modal" aria-label="Close"><i class="lni lni-close"></i></button>
            <div class="login-modal-main">
                <div class="heading">
                    <h3 id="coverLetterModalLabel{{ $loop->iteration }}">{{ __('Cover Letter') }}</h3>
                </div>
                <div class="modal-body">
                    {!! nl2br(e($applicant->cover_letter)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection