<div>
    <!-- Filter Section -->
    <div class="job-filter-wrap bg-light rounded p-3 mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text"
                    wire:model.live="search"
                    class="form-control"
                    placeholder="{{ __('Search by offer title...') }}">
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
                    <option value="">{{ __('All District') }}</option>
                    @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->translated_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model.live="selectedStatus" class="form-control">
                    <option value="">{{ __('All Status') }}</option>
                    <option value="pending">{{ __('Pending') }}</option>
                    <option value="accepted">{{ __('Accepted') }}</option>
                    <option value="rejected">{{ __('Rejected') }}</option>
                    <option value="withdrawn">{{ __('Withdrawn') }}</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Loading indicator -->
    <div wire:loading.delay class="text-center py-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="job-items bg-white shadow-sm rounded">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th width="25%">{{ __('Offer Title') }}</th>
                        <th width="15%">{{ __('Category') }}</th>
                        <th width="15%">{{ __('Address') }}</th>
                        <th width="10%">{{ __('Type') }}</th>
                        <th width="10%" class="text-center">{{ __('Status') }}</th>
                        <th width="10%" class="text-center">{{ __('Approval') }}</th>
                        <th width="10%" class="text-center">{{ __('Applied') }}</th>
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
                                    <i class="lni lni-map-marker"></i>
                                    {{ $offer->district?->translated_name ?? 'N/A' }}
                                </small>
                            </div>
                        </td>
                        <td>
                            <span class="badge" style="background-color: #0ea5e9; color: white;">
                                {{ $offer->category->translated_name }}
                            </span>
                        </td>
                        <td>
                            <div class="address-info">
                                <span class="fw-bold">{{ $offer->address ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td>
                            @if($offer->type->slug == 'full-time')
                            <span class="badge" style="background-color: #10b981; color: white;">{{ $offer->type->translated_name }}</span>
                            @elseif($offer->type->slug == 'part-time')
                            <span class="badge" style="background-color: #f59e0b; color: white;">{{ $offer->type->translated_name }}</span>
                            @elseif($offer->type->slug == 'contract')
                            <span class="badge" style="background-color: #8b5cf6; color: white;">{{ $offer->type->translated_name }}</span>
                            @elseif($offer->type->slug == 'freelance')
                            <span class="badge" style="background-color: #3b82f6; color: white;">{{ $offer->type->translated_name }}</span>
                            @else
                            <span class="badge" style="background-color: #6b7280; color: white;">{{ $offer->type->translated_name }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($offer->status == 'active')
                            <span class="badge" style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-checkmark-circle"></i> {{ __('Active') }}
                            </span>
                            @elseif($offer->status == 'paused')
                            <span class="badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-timer"></i> {{ __('Paused') }}
                            </span>
                            @elseif ($offer->status = 'closed')
                            <span class="badge" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-ban"></i> {{ __('Closed') }}
                            </span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($offer->approval_status == 'approved')
                            <span class="badge" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-checkmark"></i> {{ __('Approved') }}
                            </span>
                            @elseif($offer->approval_status == 'rejected')
                            <span class="badge" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 6px 12px;">
                                <i class="lni lni-close"></i> {{ __('Rejected') }}
                            </span>
                            @elseif($offer->approval_status == 'pending')
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
                            <small class="text-muted">{{ $offer->created_at->format('d M, Y') }}</small>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('offers.show', $offer->id) }}"
                                    class="btn btn-outline-primary"
                                    title="{{ __('View Offer') }}">
                                    <i class="lni lni-eye"></i>
                                </a>
                                <a href="{{ route('offers.edit', $offer->id) }}"
                                    class="btn btn-outline-warning"
                                    title="{{ __('Edit') }}">
                                    <i class="lni lni-pencil"></i>
                                </a>
                                <button type="button"
                                    class="btn btn-outline-danger"
                                    onclick="deleteOffer({{ $offer->id }}, '{{ $offer->title }}')"
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
                                <i class="lni lni-inbox" style="font-size: 3rem; color: #dee2e6;"></i>
                                <p class="mt-3 mb-1">{{ __('No offers found') }}</p>
                                <p class="text-muted mb-4">{{ __('Start creating offers to see them here.') }}</p>
                                <a href="{{ route('offers.create') }}" class="btn btn-primary">
                                    <i class="lni lni-plus"></i> {{ __('Create Offer') }}
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
    <div class="pagination left pagination-md-center">
        <ul class="pagination-list">
            @if ($offers->onFirstPage())
            <li class="disabled"><span><i class="lni lni-arrow-left"></i></span></li>
            @else
            <li><a href="{{ $offers->previousPageUrl() }}"><i class="lni lni-arrow-left"></i></a></li>
            @endif

            @foreach ($offers->getUrlRange(1, $offers->lastPage()) as $page => $url)
            @if ($page == $offers->currentPage())
            <li class="active"><a href="#">{{ $page }}</a></li>
            @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach

            @if ($offers->hasMorePages())
            <li><a href="{{ $offers->nextPageUrl() }}"><i class="lni lni-arrow-right"></i></a></li>
            @else
            <li class="disabled"><span><i class="lni lni-arrow-right"></i></span></li>
            @endif
        </ul>
    </div>
    @endif
    <!-- End Pagination -->
</div>

<script>
    const locale = '{{ app()->getLocale() }}';

    function deleteOffer(offerId, offerTitle) {
        Swal.fire({
            title: '{{ __("Are you sure?") }}',
            text: '{{ __("You want to delete this offer:") }} ' + offerTitle,
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
                form.action = '/' + locale + '/offers/destroy/' + offerId;

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