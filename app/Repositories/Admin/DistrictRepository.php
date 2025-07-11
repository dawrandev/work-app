<?php

namespace App\Repositories\Admin;

use App\Models\District;
use Illuminate\Support\Facades\DB;

class DistrictRepository
{
    public function all()
    {
        return District::paginate(10);
    }

    public function create($data)
    {
        $districtData = [
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ];

        return District::create($districtData);
    }

    public function update($data, $district)
    {
        $district->update([
            'name' => json_encode($data['name'], JSON_UNESCAPED_UNICODE)
        ]);

        return $district;
    }
}
