<div>
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <label>{{ __('Category*') }}</label>
                <select name="category_id" wire:model.live="selectedCategory" class="form-control">
                    <option value="">{{ __('Categories') }}</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->translated_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <label>{{ __('Sub Category*') }}</label>
                <select name="subcategory_id" wire:model.live="selectedSubCategory" class="form-control " {{ empty($selectedCategory) ? 'disabled' : '' }}>
                    <option value="">{{ __('Subcategories') }}</option>
                    @foreach ($subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}">{{ $subCategory->translated_name }}</option>
                    @endforeach
                </select>
                @error('subcategory_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>