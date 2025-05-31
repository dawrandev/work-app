<?php

namespace App\Repositories;

use App\Models\OrderImage;

class OrderImageRepository
{
    public function create(array $data)
    {
        OrderImage::create($data);
    }
}
