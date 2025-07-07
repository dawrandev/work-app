<?php

namespace App\Repositories;

use App\Models\OfferSave;
use App\Models\User;
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

    public function destroy($offer_id)
    {
        return DB::table('save_offers')
            ->where('user_id', auth()->id())
            ->where('offer_id', $offer_id)
            ->delete();
    }

    public function SavedOffers($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return collect();
        }

        return $user->savedOffers()->paginate(5)->appends(request()->query());
    }
}
