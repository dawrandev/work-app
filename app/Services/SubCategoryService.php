<?php

namespace App\Services;

use App\Repositories\SubCategoryRepository;

class SubCategoryService
{
    public function __construct(
        protected SubCategoryRepository $subCategoryRepository,
    ) {
        // 
    }

    public function getAllSubCategories()
    {
        return $this->subCategoryRepository->getAll();
    }

    public function getSubCategoryJobs($subCategoryId)
    {
        return $this->subCategoryRepository->getSubCategoryJobs($subCategoryId);
    }
}
