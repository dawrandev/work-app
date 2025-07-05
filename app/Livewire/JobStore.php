<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class JobStore extends Component
{
    public $selectedCategory = '';
    public $selectedSubCategory = '';

    public $categories = [];
    public $subCategories = [];

    public function mount($selectedCategoryId = null, $selectedSubcategoryId = null)
    {
        $this->categories = Category::all();

        if ($selectedCategoryId) {
            $this->selectedCategory = $selectedCategoryId;
            $this->subCategories = SubCategory::where('category_id', $selectedCategoryId)->get();

            if ($selectedSubcategoryId) {
                $this->selectedSubCategory = $selectedSubcategoryId;
            }
        } else {
            $this->subCategories = collect();
        }
    }

    public function updatedSelectedCategory($categoryId)
    {
        if ($categoryId) {
            $this->subCategories = SubCategory::where('category_id', $categoryId)->get();
        } else {
            $this->subCategories = collect();
        }

        // Reset subcategory selection when category changes
        $this->selectedSubCategory = '';
    }

    public function render()
    {
        return view('livewire.job-store');
    }
}
