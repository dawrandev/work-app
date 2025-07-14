<?php

namespace App\Services\Admin;

use App\Models\Offer;
use App\Repositories\Admin\OfferRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OfferService
{
    public function __construct(protected OfferRepository $offerRepository)
    {
        //
    }

    public function updateOfferStatus(Offer $offer, string $status)
    {
        try {
            return $this->offerRepository->updateStatus($offer->id, $status);
        } catch (Exception $e) {
            throw new Exception("offer status update failed: " . $e->getMessage());
        }
    }

    public function getOffers(array $filters = []): LengthAwarePaginator
    {
        return $this->offerRepository->getOffers($filters);
    }


    public function getOfferById(int $id): ?Offer
    {
        return $this->offerRepository->getOfferById($id);
    }


    /**
     * Delete an offer
     */
    public function deleteOffer(int $id): bool
    {
        return $this->offerRepository->deleteOffer($id);
    }

    /**
     * Get offers by status
     */
    public function getOffersByStatus(string $status): Collection
    {
        return $this->offerRepository->getOffersByStatus($status);
    }

    /**
     * Get offers by approval status
     */
    public function getOffersByApprovalStatus(string $approvalStatus): Collection
    {
        return $this->offerRepository->getOffersByApprovalStatus($approvalStatus);
    }

    /**
     * Get offers by category
     */
    public function getOffersByCategory(int $categoryId): Collection
    {
        return $this->offerRepository->getOffersByCategory($categoryId);
    }

    /**
     * Search offers
     */
    public function searchOffers(string $search): LengthAwarePaginator
    {
        return $this->offerRepository->searchOffers($search);
    }
}
