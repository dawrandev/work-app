<?php

namespace App\Services\Admin;

use App\Repositories\Admin\SubCategoryRepository;

class SubCategoryService
{
    public function __construct(protected SubCategoryRepository $subCategoryRepository)
    {
        // 
    }

    public function getSubCategories()
    {
        return $this->subCategoryRepository->getAll();
    }
}
