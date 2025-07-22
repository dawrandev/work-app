<div>
    <!-- Search Filter Section -->
    <div class="search-job">
        <div class="container">
            <div class="search-nner">
                <div class="row">
                    <!-- Category Select -->
                    <div class="col-lg-2 col-md-2 col-2">
                        <select wire:model.live="selectedCategory" class="select">
                            <option value="">{{ __('Categories') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->translated_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subcategory Select -->
                    <div class="col-lg-2 col-md-2 col-2">
                        <select wire:model.live="selectedSubCategory" class="select" {{ empty($selectedCategory) ? 'disabled' : '' }}>
                            <option value="">{{ __('Subcategories') }}</option>
                            @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}">{{ $subCategory->translated_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- District Select -->
                    <div class="col-lg-2 col-md-2 col-2">
                        <select wire:model.live="selectedDistrict" class="select">
                            <option value="">{{ __('Districts') }}</option>
                            @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->translated_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Type Select -->
                    <div class="col-lg-2 col-md-2 col-2">
                        <select wire:model.live="selectedType" class="select">
                            <option value="">{{ __('Types') }}</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->translated_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Salary From -->
                    <div class="col-lg-2 col-md-2 col-2">
                        <select wire:model.live="salaryFrom" class="select">
                            <option value="">{{ __('Salary from') }}</option>
                            @foreach ([1000000, 2000000, 3000000, 4000000, 5000000, 10000000, 20000000] as $salary)
                            <option value="{{ $salary }}">{{ number_format($salary, 0, ',', ' ') }} sum</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Salary To -->
                    <div class="col-lg-2 col-md-2 col-2">
                        <select wire:model.live="salaryTo" class="select">
                            <option value="">{{ __('Salary to') }}</option>
                            @foreach ([1000000, 2000000, 3000000, 4000000, 5000000, 10000000, 20000000] as $salary)
                            <option value="{{ $salary }}">{{ number_format($salary, 0, ',', ' ') }} sum</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Clear Filters Button -->
                <div class="row mt-3">
                    <div class="col-12">
                        <button wire:click="clearFilters" class="btn btn-outline-secondary">
                            {{ __('Clear Filters') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Listings -->
    <div class="container">
        <div class="single-head">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <p class="results-count fw-bold fs-5 text-secondary">
                        {{ __('Found :count offers', ['count' => $offers->total()]) }}
                    </p>
                </div>
            </div>
            <div class="row">
                @forelse ($offers as $offer)
                <div class="col-lg-6 col-12">
                    <div class="single-job">
                        <div class="job-image">
                            @if($offer->category && $offer->category->icon)
                            <i class="{{ $offer->category->icon }}" style="font-size: 3rem;"></i>
                            @else
                            <i class="lni lni-briefcase" style="font-size: 3rem;"></i>
                            @endif
                        </div>
                        <div class="job-content">
                            <h4>
                                @if($offer->id)
                                <a href="{{ route('offers.show', ['locale' => app()->getLocale(), 'offer' => $offer]) }}">
                                    {{ $offer->category ? $offer->category->translated_name : __('No Category') }}
                                </a>
                                <br>
                                <a href="{{ route('offers.show', ['locale' => app()->getLocale(), 'offer' => $offer]) }}">
                                    {{ $offer->subcategory ? $offer->subcategory->translated_name : __('No Subcategory') }}
                                </a>
                                @else
                                <span>{{ $offer->category ? $offer->category->translated_name : __('No Category') }}</span>
                                <br>
                                <span>{{ $offer->subcategory ? $offer->subcategory->translated_name : __('No Subcategory') }}</span>
                                @endif
                            </h4>
                            <p>{{ $offer->title }}</p>
                            <ul>
                                <li>
                                    {{ $offer->salary_from ? number_format($offer->salary_from, 0, ',', ' ') : '0' }} -
                                    {{ $offer->salary_to ? number_format($offer->salary_to, 0, ',', ' ') : '0' }} sum
                                </li>
                                <li>
                                    <i class="lni lni-map-marker"></i>
                                    {{ $offer->district->translated_name ? $offer->district->translated_name : __('No District') }}
                                </li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                @if($offer->id)
                                <li><a href="{{ route('offers.show', ['locale' => app()->getLocale(), 'offer' => $offer]) }}">{{ __('Details') }}</a></li>
                                @else
                                <li><span class="btn-disabled">{{ __('Details') }}</span></li>
                                @endif
                                <li><span>{{ $offer->type ? $offer->type->translated_name : __('No Type') }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @empty
                <div class="col-12">
                    <div class="no-jobs-found text-center py-5">
                        <h4>{{ __('No offers found') }}</h4>
                        <p>{{ __('Please try adjusting your filters or') }}
                            <button wire:click="clearFilters" class="btn btn-link p-0">{{ __('clear all filters') }}</button>
                        </p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($offers->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            @if ($offers->onFirstPage())
                            <li class="disabled"><span><i class="lni lni-arrow-left"></i></span></li>
                            @else
                            <li><a href="#" wire:click.prevent="previousPage" wire:loading.attr="disabled"><i class="lni lni-arrow-left"></i></a></li>
                            @endif

                            @foreach ($offers->getUrlRange(1, $offers->lastPage()) as $page => $url)
                            @if ($page == $offers->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                            @else
                            <li><a href="#" wire:click.prevent="gotoPage({{ $page }})" wire:loading.attr="disabled">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            @if ($offers->hasMorePages())
                            <li><a href="#" wire:click.prevent="nextPage" wire:loading.attr="disabled"><i class="lni lni-arrow-right"></i></a></li>
                            @else
                            <li class="disabled"><span><i class="lni lni-arrow-right"></i></span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Loading indicator -->
            <div wire:loading.delay class="text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
    </div>
</div>