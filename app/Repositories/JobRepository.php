<?php

namespace App\Repositories;

use App\Models\Job;
use App\Models\User;

class JobRepository
{
    public function create(array $data)
    {
        return Job::create($data);
    }

    public function filter(array $filters)
    {
        return Job::with('category')->when(!empty($filters['category_id']), function ($query) use ($filters) {
            return $query->where('category_id', $filters['category_id']);
        })
            ->when(!empty($filters['subcategory_id']), function ($query) use ($filters) {
                return $query->where('subcategory_id', $filters['subcategory_id']);
            })
            ->when(!empty($filters['district_id']), function ($query) use ($filters) {
                return $query->where('district_id', $filters['district_id']);
            })
            ->latest()
            ->paginate(10)
            ->appends($filters);
    }

    public function getJob($id)
    {
        return Job::where('id', $id)->get();
    }

    public function getUserJobs($user_id)
    {
        return Job::where('user_id', $user_id)
            ->with(['category', 'district', 'type', 'images'])
            ->latest()
            ->paginate(5)
            ->appends(request()->query());
    }

    public function update(Job $job, array $data)
    {
        $job->update($data);

        return $job;
    }
}
