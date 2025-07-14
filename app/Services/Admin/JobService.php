<?php

namespace App\Services\Admin;

use App\Models\Job;
use App\Repositories\Admin\JobRepository;
use Exception;

class JobService
{
    public function __construct(protected JobRepository $jobRepository)
    {
        // 
    }

    public function getJobs($request)
    {
        try {
            return $this->jobRepository->getAll($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateJobStatus(string $status, Job $job)
    {
        try {
            return $this->jobRepository->updateStatus($job->id, $status);
        } catch (Exception $e) {
            throw new Exception("Job status update failed: " . $e->getMessage());
        }
    }
}
