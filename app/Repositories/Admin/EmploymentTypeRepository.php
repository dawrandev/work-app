<?php

namespace App\Repositories\Admin;

use App\Models\EmploymentType;
use Illuminate\Support\Facades\DB;

class EmploymentTypeRepository
{
    public function all()
    {
        return EmploymentType::paginate(10);
    }

    public function create($data)
    {
        $employmentTypeData = [
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ];

        return EmploymentType::create($employmentTypeData);
    }

    public function update($data, $employmentType)
    {
        $employmentType->update([
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ]);

        return $employmentType;
    }
}
