<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function all()
    {
        return Category::paginate(10);
    }

    public function create($data)
    {
        $categoryData = [
            'icon' => $data['icon'],
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ];

        return Category::create($categoryData);
    }

    public function update($data, $category)
    {
        $category->update([
            'icon' => $data['icon'] ?? $category->icon,
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ]);

        return $category;
    }
}
