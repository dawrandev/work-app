<?php

namespace App\Services\Admin;

use App\Repositories\Admin\SubCategoryRepository;
use Exception;

class SubCategoryService
{
    public function __construct(protected SubCategoryRepository $subCategoryRepository)
    {
        // 
    }

    public function getFilteredCategory(array $filters)
    {
        try {
            $cleanFilters = array_filter($filters, function ($value) {
                return !is_null($value) && $value !== '';
            });
            return $this->subCategoryRepository->getFilteredCategory($filters);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function createSubcategory(array $data)
    {
        try {
            return $this->subCategoryRepository->create($data);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateSubcategory($data, $subcategory)
    {
        try {
            return $this->subCategoryRepository->update($data, $subcategory);
        } catch (Exception $e) {
            throw new Exception('Error updating Subcategory:' . $e->getMessage());
        }
    }
}
