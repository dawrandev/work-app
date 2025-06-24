<?php

namespace App\Services;

use App\Repositories\OfferSaveRepository;

class OfferSaveService
{
    public function __construct(
        protected OfferSaveRepository $offerSaveRepository
    ) {}

    public function saveOffer(array $data, $request)
    {
        $userId = auth()->id();

        if ($this->offerSaveRepository->exists($userId, $data['offer_id'])) {
            throw new \Exception("You already saved this offer.");
        }

        $this->offerSaveRepository->store([
            'user_id' => $userId,
            'offer_id' => $data['offer_id'],
        ]);
    }
}
    