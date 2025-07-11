<?php

namespace App\Services\Admin;

use App\Repositories\Admin\TypeRepository;
use Exception;

class TypeService
{
    public function __construct(protected TypeRepository $typeRepository)
    {
        // 
    }

    public function getTypes()
    {
        $types = $this->typeRepository->all();

        return $types;
    }

    public function createType(array $data)
    {
        try {
            return $this->typeRepository->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating type: ' . $e->getMessage());
        }
    }

    public function updateType($data, $type)
    {
        try {
            return $this->typeRepository->update($data, $type);
        } catch (Exception $e) {
            throw new Exception('Error updating type:' . $e->getMessage());
        }
    }
}
