<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function getApplicants($jobId)
    {
        $applicants = DB::table('job_applies')
            ->join('users', 'job_applies.user_id', '=', 'users.id')
            ->join('offers', 'job_applies.offer_id', '=', 'offers.id')
            ->join('jobs', 'job_applies.job_id', '=', 'jobs.id')
            ->select(
                'job_applies.id as id',
                'users.image',
                'users.first_name',
                'users.last_name',
                'users.phone',
                'offers.id as offer_id',
                'offers.title as offer_title',
                'offers.status as offer_status',
                'job_applies.cover_letter',
                'job_applies.status as approval_status',
                'job_applies.created_at as applied_at'
            )
            ->where('job_applies.job_id', $jobId)
            ->paginate(10)
            ->appends(request()->query());

        return $applicants;
    }

    public function updateStatus($id, $status)
    {
        $applicant = DB::table('job_applies')
            ->where('id', $id)
            ->update([
                'status' => $status
            ]);

        return $applicant;
    }
}
