<?php

namespace App\Services\Admin;

use App\Repositories\Admin\CategoryRepository;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {
        // 
    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->all();

        return $categories;
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }
}
