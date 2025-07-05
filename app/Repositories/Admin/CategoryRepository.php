<?php

namespace App\Repositories\Admin;

use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::paginate(10);
    }
}
