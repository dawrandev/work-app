<div>
    <form class="home-search wow fadeInRight" data-wow-delay=".5s">
        <div class="form-group select-border">
            <label class="font-weight-bold text-dark">{{ __('Select Category') }}</label>
            <select name="category_id" wire:model="selectedCategory" wire:change="SubCategories" class="form-control basic-select">
                <option value="{{ $categories->first()->id ?? '' }}">{{ $categories->first()->translated_name ?? __('Select Category') }}</option>
                @foreach ($categories as $category)
                @if ($loop->first) @continue @endif
                <option value="{{ $category->id }}">{{ $category->translated_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group select-border">
            <label class="font-weight-bold text-dark">{{ __('Select Subcategory') }}</label>
            <select name="subcategory_id" wire:model="selectedSubCategory" class="form-control basic-select mt-3">
                <option value="{{ $subCategories->first()->id ?? '' }}">{{ $subCategories->first()->translated_name ?? __('Select Subcategory') }}</option>
                @foreach ($subCategories as $category)
                @if ($loop->first) @continue @endif
                <option value="{{ $category->id }}">{{ $category->translated_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group select-border">
            <label class="font-weight-bold text-dark">{{ __('Select District') }}</label>
            @php
            $districts = getDistricts();
            @endphp
            <select class="form-control basic-select">
                <option value="{{ $districts->first()->id ?? '' }}">
                    {{ $districts->first()->translated_name ?? __('Select District') }}
                </option>
                @foreach ($districts->skip(1) as $district)
                <option value="{{ $district->id }}">{{ $district->translated_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="button">
            <a class="btn" href="#">{{ __('Search') }}</a>
        </div>
    </form>
</div>