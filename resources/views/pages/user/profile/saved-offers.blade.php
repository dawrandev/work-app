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
                    <h3 class="page-title">{{ __('Saved Offers') }}</h3>
                </div>
            </div>
        </div>

        <div class="job-items bg-white shadow-sm rounded">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="5%" class="text-center">#</th>
                            <th width="25%">{{ __('Offer Title') }}</th>
                            <th width="15%">{{ __('Category') }}</th>
                            <th width="15%">{{ __('Location') }}</th>
                            <th width="10%">{{ __('Type') }}</th>
                            <th width="10%" class="text-center">{{ __('Status') }}</th>
                            <th width="10%" class="text-center">{{ __('Posted') }}</th>
                            <th width="10%" class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offers as $offer)
                        <tr>
                            <td class="text-center">
                                <span class="text-muted">{{ ($offers->currentPage() - 1) * $offers->perPage() + $loop->iteration }}</span>
                            </td>
                            <td>
                                <div class="job-title-wrap">
                                    <h6 class="mb-1">
                                        <a href="{{ route('offers.show', $offer->id) }}" class="text-dark text-decoration-none">
                                            {{ $offer->title }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        <i class="lni lni-eye"></i> {{ $offer->current_views ?? 0 }} {{__('views')}} •
                                        <i class="lni lni-users"></i> {{ $offer->applications_count ?? 0 }} {{__('applicants')}}
                                    </small>
                                </div>
                            </td>
                            <td>
                                <span class="badge" style="background-color: #0ea5e9; color: white;">
                                    {{ $offer->category->translated_name ?? $offer->category->name }}
                                </span>
                            </td>
                            <td>
                                <span class="text-muted">
                                    <i class="lni lni-map-marker"></i> {{ $offer->district->translated_name ?? $offer->district->name ?? $offer->location }}
                                </span>
                            </td>
                            <td>
                                @if($offer->type->slug == 'full-time')
                                <span class="badge" style="background-color: #10b981; color: white;">{{ $offer->type->translated_name ?? $offer->type->name }}</span>
                                @elseif($offer->type->slug == 'part-time')
                                <span class="badge" style="background-color: #f59e0b; color: white;">{{ $offer->type->translated_name ?? $offer->type->name }}</span>
                                @elseif($offer->type->slug == 'contract')
                                <span class="badge" style="background-color: #8b5cf6; color: white;">{{ $offer->type->translated_name ?? $offer->type->name }}</span>
                                @elseif($offer->type->slug == 'freelance')
                                <span class="badge" style="background-color: #3b82f6; color: white;">{{ $offer->type->translated_name ?? $offer->type->name }}</span>
                                @else
                                <span class="badge" style="background-color: #6b7280; color: white;">{{ $offer->type->translated_name ?? $offer->type->name }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($offer->status == 'active')
                                <span class="badge" style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-checkmark-circle"></i> {{ __('Active') }}
                                </span>
                                @elseif($offer->status == 'inactive')
                                <span class="badge" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; padding: 6px 12px;">
                                    <i class="lni lni-close"></i> {{ __('Inactive') }}
                                </span>
                                @elseif($offer->status == 'pending')
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
                                <small class="text-muted">{{ $offer->created_at->format('d M, Y') }}</small>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('offers.show', $offer->id) }}"
                                        class="btn btn-outline-primary"
                                        title="{{ __('View') }}">
                                        <i class="lni lni-eye"></i>
                                    </a>
                                    <button type="button"
                                        class="btn btn-outline-danger"
                                        onclick="deleteOffer({{ $offer->id }}, '{{ $offer->title }}')"
                                        title="{{ __('Remove from Saved') }}">
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
                                    <p class="mt-3 mb-1">{{ __('No saved offers found') }}</p>
                                    <a href="{{ route('offers.index') }}" class="btn btn-primary">
                                        <i class="lni lni-plus"></i> {{ __('Browse Offers') }}
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
        @if ($offers->hasPages())
        <div class="pagination-wrapper mt-4">
            {{ $offers->links() }}
        </div>
        @endif
    </div>
</div>


<script>
    const locale = '{{ app()->getlocale() }}';

    function deleteOffer(offerId, offerTitle) {
        Swal.fire({
            title: '{{ __("Are you sure?") }}',
            text: '{{ __("You want to remove this offer from saved:") }} ' + offerTitle,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '{{ __("Yes, remove it!") }}',
            cancelButtonText: '{{ __("Cancel") }}'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '/' + locale + '/offers/unsave/' + offerId;

                var csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

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