<?php

namespace App\Services\Admin;

use App\Repositories\Admin\EmploymentTypeRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class EmploymentTypeService
{
    public function __construct(protected EmploymentTypeRepository $employmentTypeRepository)
    {
        // 
    }

    public function getEmploymentTypes()
    {
        $employmentTypes = $this->employmentTypeRepository->all();

        return $employmentTypes;
    }

    public function createEmploymentType(array $data)
    {
        try {
            return $this->employmentTypeRepository->create($data);
        } catch (Exception $e) {
            Log::error('Error creating employment type:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function updateEmploymentType($data, $employmentType)
    {
        try {
            return $this->employmentTypeRepository->update($data, $employmentType);
        } catch (Exception $e) {
            throw new Exception('Error updating employment type:' . $e->getMessage());
        }
    }
}
