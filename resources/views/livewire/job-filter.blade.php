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
                        {{ __('Found :count jobs', ['count' => $jobs->total()]) }}
                    </p>
                </div>
            </div>
            <div class="row">
                @forelse ($jobs as $job)
                <div class="col-lg-6 col-12">
                    <div class="single-job">
                        <div class="job-image">
                            @if($job->category && $job->category->icon)
                            <i class="{{ $job->category->icon }}" style="font-size: 3rem;"></i>
                            @else
                            <i class="lni lni-briefcase" style="font-size: 3rem;"></i>
                            @endif
                        </div>
                        <div class="job-content">
                            <h4>
                                @if($job->id)
                                <a href="{{ route('jobs.show', ['locale' => app()->getLocale(), 'job' => $job]) }}">
                                    {{ $job->category ? $job->category->translated_name : __('No Category') }}
                                </a>
                                <br>
                                <a href="{{ route('jobs.show', ['locale' => app()->getLocale(), 'job' => $job]) }}">
                                    {{ $job->subcategory ? $job->subcategory->translated_name : __('No Subcategory') }}
                                </a>
                                @else
                                <span>{{ $job->category ? $job->category->translated_name : __('No Category') }}</span>
                                <br>
                                <span>{{ $job->subcategory ? $job->subcategory->translated_name : __('No Subcategory') }}</span>
                                @endif
                            </h4>
                            <p>{{ $job->title ?? __('No Title') }}</p>
                            <ul>
                                <li>
                                    {{ $job->salary_from ? number_format($job->salary_from, 0, ',', ' ') : '0' }} -
                                    {{ $job->salary_to ? number_format($job->salary_to, 0, ',', ' ') : '0' }} sum
                                </li>
                                <li>
                                    <i class="lni lni-map-marker"></i>
                                    {{ $job->district->translated_name ? $job->district->translated_name : __('No District') }}
                                </li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                @if($job->id)
                                <li><a href="{{ route('jobs.show', ['locale' => app()->getLocale(), 'job' => $job]) }}">{{ __('Details') }}</a></li>
                                @else
                                <li><span class="btn-disabled">{{ __('Details') }}</span></li>
                                @endif
                                <li><span>{{ $job->type ? $job->type->translated_name : __('No Type') }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @empty
                <div class="col-12">
                    <div class="no-jobs-found text-center py-5">
                        <h4>{{ __('No jobs found') }}</h4>
                        <p>{{ __('Please try adjusting your filters or') }}
                            <button wire:click="clearFilters" class="btn btn-link p-0">{{ __('clear all filters') }}</button>
                        </p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($jobs->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            @if ($jobs->onFirstPage())
                            <li class="disabled"><span><i class="lni lni-arrow-left"></i></span></li>
                            @else
                            <li><a href="#" wire:click.prevent="previousPage" wire:loading.attr="disabled"><i class="lni lni-arrow-left"></i></a></li>
                            @endif

                            @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                            @if ($page == $jobs->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                            @else
                            <li><a href="#" wire:click.prevent="gotoPage({{ $page }})" wire:loading.attr="disabled">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            @if ($jobs->hasMorePages())
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