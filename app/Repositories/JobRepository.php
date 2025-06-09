<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    public function create(array $data)
    {
        return Job::create($data);
    }

    public function filter(array $filters)
    {
        return Job::when(!empty($filters['category_id']), function ($query) use ($filters) {
            return $query->where('category_id', $filters['category_id']);
        })
            ->when(!empty($filters['district_id']), function ($query) use ($filters) {
                return $query->where('district_id', $filters['district_id']);
            })
            ->when(!empty($filters['type_id']), function ($query) use ($filters) {
                return $query->where('type_id', $filters['type_id']);
            })
            ->latest()
            ->paginate(10)
            ->appends($filters);
    }

    public function getJob($id)
    {
        return Job::where('id', $id)->get();
    }

    public function getUserJobs($job_id)
    {
        return Job::where('id', $job_id)->get();
    }
}
