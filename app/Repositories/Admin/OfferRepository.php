<?php

namespace App\Repositories\Admin;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OfferRepository
{
    protected $offer;

    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function getOffers(array $filters = []): LengthAwarePaginator
    {
        $query = Offer::with(['user', 'category', 'subcategory', 'district', 'type']);

        if (isset($filters['search']) && !empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            });
        }

        if (isset($filters['status']) && !empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['approval_status']) && !empty($filters['approval_status'])) {
            $query->where('approval_status', $filters['approval_status']);
        }

        if (isset($filters['category_id']) && !empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        return $query->latest()->paginate(15);
    }

    public function getOfferById(int $id): ?Offer
    {
        return Offer::with(['images', 'category', 'subcategory', 'type', 'employmentType', 'district', 'user'])
            ->find($id);
    }

    public function updateStatus($id, string $status)
    {
        $offer = $this->offer->findOrFail($id);
        $offer->update(['approval_status' => $status]);
        return $offer;
    }


    public function deleteOffer(int $id): bool
    {
        $offer = Offer::find($id);
        if ($offer) {
            return $offer->delete();
        }
        return false;
    }

    /**
     * Get offers by status
     */
    public function getOffersByStatus(string $status): Collection
    {
        return Offer::with(['user', 'category', 'district'])
            ->where('status', $status)
            ->latest()
            ->get();
    }

    /**
     * Get offers by approval status
     */
    public function getOffersByApprovalStatus(string $approvalStatus): Collection
    {
        return Offer::with(['user', 'category', 'district'])
            ->where('approval_status', $approvalStatus)
            ->latest()
            ->get();
    }

    /**
     * Get offers by category
     */
    public function getOffersByCategory(int $categoryId): Collection
    {
        return Offer::with(['user', 'category', 'district'])
            ->where('category_id', $categoryId)
            ->latest()
            ->get();
    }

    /**
     * Search offers
     */
    public function searchOffers(string $search): LengthAwarePaginator
    {
        return Offer::with(['user', 'category', 'district'])
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate(15);
    }

    /**
     * Get recent offers
     */
    public function getRecentOffers(int $limit = 10): Collection
    {
        return Offer::with(['user', 'category', 'district'])
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * Get offers count by month for the current year
     */
    public function getOffersCountByMonth(): array
    {
        $counts = [];
        for ($month = 1; $month <= 12; $month++) {
            $counts[$month] = Offer::whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $month)
                ->count();
        }
        return $counts;
    }
}
