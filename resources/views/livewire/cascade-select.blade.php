<div>
    <form action="{{ route('jobs.index', ['locale'=> app()->getLocale()]) }}" method="GET" class="home-search wow fadeInRight" data-wow-delay=".5s">
        <div class="form-group select-border">
            <label class="font-weight-bold text-dark">{{ __('Select Category') }}</label>
            <select name="category_id" wire:model="selectedCategory" wire:change="SubCategories" class="form-control basic-select">
                <option value="">{{ __('All Categories') }}</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->translated_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group select-border">
            <label class="font-weight-bold text-dark">{{ __('Select Subcategory') }}</label>
            <select name="subcategory_id" wire:model="selectedSubCategory" class="form-control basic-select mt-3">
                <option value="">{{ __('All Subcategories') }}</option>
                @foreach ($subCategories as $category)
                <option value="{{ $category->id }}">{{ $category->translated_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group select-border">
            <label class="font-weight-bold text-dark">{{ __('Select District') }}</label>
            @php
            $districts = getDistricts();
            @endphp
            <select name="district_id" class="form-control basic-select">
                <option value="">{{ __('All Districts') }}</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}">{{ $district->translated_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="button">
            <input type="submit" value="{{ __('Search') }}" class="btn btn-primary">
        </div>
    </form>
</div>