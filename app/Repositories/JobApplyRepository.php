<?php

namespace App\Repositories;

use App\Models\User;

class JobApplyRepository
{
    public function getUserOffers(int $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return collect();
        }

        return $user->offers ?? collect();
    }

    public function hasUserAppliedToJob(int $userId, int $jobId): bool
    {
        $user = User::find($userId);
        if (!$user) {
            return false;
        }

        return $user->appliedJobs()->where('job_id', $jobId)->exists();
    }

    public function createApplication(array $data)
    {
        $user = User::find($data['user_id']);
        if (!$user) {
            throw new \Exception('User not found');
        }

        return $user->appliedJobs()->attach($data['job_id'], [
            'offer_id' => $data['offer_id'],
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

        return $user->appliedJobs()->withPivot([
            'id',
            'offer_id',
            'cover_letter',
            'status',
        ])->orderBy('job_applies.created_at', 'desc')->get();
    }
}
