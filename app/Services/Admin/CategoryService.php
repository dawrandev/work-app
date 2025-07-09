<?php

namespace App\Services\Admin;

use App\Repositories\Admin\CategoryRepository;
use Exception;

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
        try {
            return $this->categoryRepository->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating category: ' . $e->getMessage());
        }
    }

    public function updateCategory($data, $category)
    {
        try {
            return $this->categoryRepository->update($data, $category);
        } catch (Exception $e) {
            throw new Exception('Error updating category:' . $e->getMessage());
        }
    }
}
