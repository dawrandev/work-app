<?php

namespace App\Repositories;

use App\Models\SubCategory;

class SubCategoryRepository
{
    public function getAll()
    {
        return SubCategory::with('category')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getSubCategoryJobs($subCategoryId)
    {
        $subCategory = SubCategory::with('category')->findOrFail($subCategoryId);

        $jobs = $subCategory->jobs()
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        $subCategory->setRelation('jobs', $jobs);

        return $subCategory;
    }
}
