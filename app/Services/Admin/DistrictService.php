<?php

namespace App\Services\Admin;

use App\Repositories\Admin\DistrictRepository;
use Exception;

class DistrictService
{
    public function __construct(protected DistrictRepository $districtRepository)
    {
        // 
    }

    public function getDistricts()
    {
        $districts = $this->districtRepository->all();

        return $districts;
    }

    public function createDistrict(array $data)
    {
        try {
            return $this->districtRepository->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating district: ' . $e->getMessage());
        }
    }

    public function updateDistrict($data, $district)
    {
        try {
            return $this->districtRepository->update($data, $district);
        } catch (Exception $e) {
            throw new Exception('Error updating district:' . $e->getMessage());
        }
    }
}
