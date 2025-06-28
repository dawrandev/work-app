<?php

namespace App\Repositories;

use App\Models\User;

class OfferApplyRepository
{
    public function getUserJobs(int $userId)
    {
        $user = User::with('jobs.district')->find($userId);

        if (!$user) {
            return collect();
        }

        return $user->jobs ?? collect();
    }

    public function hasUserAppliedToOffer(int $userId, int $offerId): bool
    {
        $user = User::find($userId);
        if (!$user) {
            return false;
        }

        return $user->appliedOffers()->where('offer_id', $offerId)->exists();
    }

    public function createApplication(array $data)
    {
        $user = User::find($data['user_id']);
        if (!$user) {
            throw new \Exception('User not found');
        }

        return $user->appliedOffers()->attach($data['offer_id'], [
            'job_id' => $data['job_id'],
            'cover_letter' => $data['cover_letter'],
            'status' => 'pending',
        ]);
    }

    public function getUserApplications(int $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return collect();
        }

        return $user->appliedOffers()->withPivot([
            'id',
            'job_id',
            'cover_letter',
            'status',
        ])->orderBy('offer_applies.created_at', 'desc')->get();
    }
}
