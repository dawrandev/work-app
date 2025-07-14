<?php

namespace App\Repositories\Admin;

use App\Models\Job;
use Exception;

class JobRepository
{
    protected $job;
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function getAll($request)
    {
        return Job::with(['user', 'category', 'subcategory', 'district', 'type'])
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->approval_status, function ($query, $approval) {
                $query->where('approval_status', $approval);
            })
            ->when($request->category_id, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->paginate(10);
    }

    public function updateStatus($id, string $status)
    {
        $job = $this->job->findOrFail($id);
        $job->update(['approval_status' => $status]);
        return $job;
    }
}
