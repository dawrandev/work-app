<?php

namespace App\Repositories;

use App\Models\Offer;

class OfferRepository
{
    public function create(array $data)
    {
        return Offer::create($data);
    }

    public function getUserOffers($user_id)
    {
        Offer::where('user_id', $user_id)
            ->with(['category', 'district', 'type', 'images'])
            ->latest()
            ->paginate(5)
            ->appends(request()->query());
    }

    public function update(Offer $offer, array $data)
    {
        $offer->update($data);

        return $offer;
    }
}
