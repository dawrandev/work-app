<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class PopularCategories extends Component
{
    public $popularCategories;

    public function mount()
    {
        $this->popularCategories = Category::withCount('jobs')->having('jobs_count', '>', 0)->orderByDesc('jobs_count')->take(6)->get();
    }

    public function render()
    {
        return view('livewire.popular-categories');
    }
}
