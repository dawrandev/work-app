<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class ServiceStore extends Component
{
    public $selectedCategory = '';
    public $selectedSubCategory = '';

    public $categories = [];
    public $subCategories = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->subCategories = collect();
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
        return view('livewire.service-store');
    }
}
