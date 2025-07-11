<?php

namespace App\Repositories\Admin;

use App\Models\Type;
use Illuminate\Support\Facades\DB;

class TypeRepository
{
    public function all()
    {
        return Type::paginate(10);
    }

    public function create($data)
    {
        $typeData = [
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ];

        return Type::create($typeData);
    }

    public function update($data, $type)
    {
        $type->update([
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ]);

        return $type;
    }
}
