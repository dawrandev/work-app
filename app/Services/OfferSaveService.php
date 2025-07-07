<?php

namespace App\Services;

use App\Repositories\OfferSaveRepository;
use Exception;

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

    public function getUserSavedOffers($user_id)
    {
        return $this->offerSaveRepository->savedOffers($user_id);
    }

    public function destroyOffer($offer_id): void
    {
        if (!$this->offerSaveRepository->destroy($offer_id)) {
            throw new Exception('Saved offer not found or already deleted');
        };
    }
}
