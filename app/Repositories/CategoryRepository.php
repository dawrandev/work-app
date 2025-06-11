<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAll()
    {
        return Category::with('subCategories')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getCategoryJobs($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $jobs = $category->jobs()
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        $category->setRelation('jobs', $jobs);

        return $category;
    }
}
