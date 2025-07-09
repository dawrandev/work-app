<?php

namespace App\Repositories\Admin;

use App\Models\SubCategory;

class SubCategoryRepository
{
    public function getAll()
    {
        return SubCategory::with('category')
            ->latest()
            ->paginate(10);
    }
}
