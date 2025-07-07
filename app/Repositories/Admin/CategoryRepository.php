<?php

namespace App\Repositories\Admin;

use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::paginate(10);
    }

    public function create($data)
    {
        $icon = $data['icon'];

        foreach ($data->name as $name) {
            $category = Category::creaet([
                'icon' => $icon,
                'name' => $name
            ]);
        }

        return $category;
    }
}
