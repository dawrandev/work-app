<?php

namespace App\Services\Admin;

use App\Models\Offer;
use App\Repositories\Admin\OfferRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OfferService
{
    public function __construct(protected OfferRepository $offerRepository)
    {
        //
    }

    /**
     * Get all offers with pagination and filters
     */
    public function getOffers(array $filters = []): LengthAwarePaginator
    {
        return $this->offerRepository->getOffers($filters);
    }

    /**
     * Get offer by ID with relationships
     */
    public function getOfferById(int $id): ?Offer
    {
        return $this->offerRepository->getOfferById($id);
    }

    /**
     * Get offers statistics
     */
    public function getOffersStats(): array
    {
        return $this->offerRepository->getOffersStats();
    }

    /**
     * Approve an offer
     */
    public function approveOffer(int $id): bool
    {
        return $this->offerRepository->approveOffer($id);
    }

    /**
     * Reject an offer
     */
    public function rejectOffer(int $id): bool
    {
        return $this->offerRepository->rejectOffer($id);
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
