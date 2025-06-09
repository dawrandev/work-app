<?php

namespace App\Repositories;

use App\Models\JobImage;

class JobImageRepository
{
    public function create(array $data)
    {
        JobImage::create($data);
    }
}
