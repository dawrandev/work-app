<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CascadeSelect extends Component
{
    public $selectedCategory = null;
    public $selectedSubCategory = null;
    public $categories;
    public $subCategories;

    public function mount()
    {
        $this->categories = Category::all();
        $this->subCategories = collect();
    }

    public function SubCategories()
    {
        $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)
            ->get();
    }

    public function render()
    {
        return view('livewire.cascade-select');
    }
}
