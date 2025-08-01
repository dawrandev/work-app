<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
    ) {
        // 
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryJobs($categoryId)
    {
        return $this->categoryRepository->getCategoryJobs($categoryId);
    }
}
