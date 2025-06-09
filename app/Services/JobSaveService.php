<?php

namespace App\Services;

use App\Repositories\JobSaveRepository;
use Illuminate\Support\Facades\DB;

class JobSaveService
{
    public function __construct(
        protected JobSaveRepository $jobSaveRepository
    ) {}
    public function saveJob(array $data)
    {
        try {
            $job = DB::table('save_jobs')->insert([
                'user_id' => auth()->id(),
                'job_id' => $data['job_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return $job;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    public function getUserJobs($user_id)
    {
        return $this->jobSaveRepository->getUserJobs($user_id);
    }
}
