<?php

namespace App\Repositories;

use App\Models\Offer;

class OfferRepository
{
    public function create(array $data)
    {
        return Offer::create($data);
    }
}
