<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class ServiceStore extends Component
{
    public $selectedCategory = '';
    public $selectedSubCategory = ''; // Bu nomni o'zgartirdik
    public $categories = [];
    public $subCategories = []; // Bu nomni o'zgartirdik

    public function mount($selectedCategoryId = null, $selectedSubcategoryId = null)
    {
        $this->categories = Category::all();

        if ($selectedCategoryId) {
            $this->selectedCategory = $selectedCategoryId;
            $this->subCategories = SubCategory::where('category_id', $selectedCategoryId)->get();

            if ($selectedSubcategoryId) {
                $this->selectedSubCategory = $selectedSubcategoryId;
            }
        }
    }

    public function updatedSelectedCategory()
    {
        $this->selectedSubCategory = '';
        $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)->get();
    }

    public function render()
    {
        return view('livewire.service-store');
    }
}
