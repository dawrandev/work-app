<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class OfferApplyRepository
{
    public function getUserJobs(int $userId)
    {
        $user = User::find($userId);

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

    public function getApplicants($offerId)
    {
        $applicants = DB::table('offer_applies')
            ->join('users', 'offer_applies.user_id', '=', 'users.id')
            ->join('offers', 'offer_applies.offer_id', '=', 'offers.id')
            ->join('jobs', 'offer_applies.job_id', '=', 'jobs.id')
            ->select(
                'offer_applies.id as id',
                'users.image',
                'users.first_name',
                'users.last_name',
                'users.phone',
                'jobs.id as job_id',
                'jobs.title as job_title',
                'jobs.status as job_status',
                'offer_applies.cover_letter',
                'offer_applies.status as approval_status',
                'offer_applies.created_at as applied_at'
            )
            ->where('offer_applies.offer_id', $offerId)
            ->paginate(10)
            ->appends(request()->query());

        return $applicants;
    }

    public function updateStatus($id, $status)
    {
        $applicant = DB::table('offer_applies')
            ->where('id', $id)
            ->update([
                'status' => $status
            ]);

        return $applicant;
    }
}
