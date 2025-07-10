<?php

namespace App\Repositories\Admin;

use App\Filters\Filter;
use App\Models\SubCategory;

class SubCategoryRepository
{
    protected $filter;
    protected $subcategory;

    public function __construct(Filter $filter, Subcategory $subcategory)
    {
        $this->filter = $filter;
        $this->subcategory = $subcategory;
    }

    public function getFilteredCategory(array $filters = [])
    {
        $query = $this->subcategory->query();

        return $this->filter->filterByCategory($query, $filters);
    }

    public function create(array $data)
    {
        $subcategoryData = [
            'category_id' => $data['category_id'],
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ];

        return $this->subcategory->create($subcategoryData);
    }

    public function update($data, $subcategory)
    {
        $subcategory->update([
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ]);

        return $subcategory;
    }
}
