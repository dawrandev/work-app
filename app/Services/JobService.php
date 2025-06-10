<?php

namespace App\Services;

use App\Http\Requests\JobStoreRequest;
use App\Repositories\JobImageRepository;
use App\Repositories\JobRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobService
{
    public function __construct(
        protected JobRepository $jobRepository,
        protected JobImageRepository $jobImageRepository
    ) {
        // 
    }

    public function createJob(array $data, $request)
    {
        try {
            DB::transaction(function () use ($data, $request) {
                $data['user_id'] = auth()->id();
                $job = $this->jobRepository->create($data);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs("jobs", $filename, 'public');

                        $jobImage = $this->jobImageRepository->create([
                            'job_id' => $job->id,
                            'image' => $filename,
                        ]);
                    }
                }

                return $job;
            });
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateJob($job, array $data, $request)
    {
        try {
            DB::transaction(function () use ($job, $data, $request) {
                $job = $this->jobRepository->update($job, $data);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs("jobs", $filename, 'public');

                        $this->jobImageRepository->update([
                            'job_id' => $job->id,
                            'image' => $filename,
                        ]);
                    }
                }
            });
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getFilteredJobs(array $filters)
    {
        return $this->jobRepository->filter($filters);
    }

    public function getJob($id)
    {
        return $this->jobRepository->getJob($id);
    }

    public function getUserJobs($user_id)
    {
        return $this->jobRepository->getUserJobs($user_id);
    }
}
