<?php

namespace App\Repositories;

use App\Models\OfferSave;
use Illuminate\Support\Facades\DB;

class OfferSaveRepository
{
    public function exists($userId, $offerId)
    {
        return DB::table('save_offers')
            ->where('user_id', $userId)
            ->where('offer_id', $offerId)
            ->exists();
    }

    public function store(array $data)
    {
        return DB::table('save_offers')->insert(
            [
                'user_id' => $data['user_id'],
                'offer_id' => $data['offer_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    public function delete($userId, $offerId)
    {
        return DB::table('save_offers')
            ->where('user_id', $userId)
            ->where('offer_id', $offerId)
            ->delete();
    }

    public function getUserSavedOffers($userId)
    {
        return DB::table('save_offers')
            ->where('user_id', $userId)
            ->get();
    }
}
