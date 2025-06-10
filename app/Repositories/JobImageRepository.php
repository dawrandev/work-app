<?php

namespace App\Repositories;

use App\Models\JobImage;

class JobImageRepository
{
    public function create(array $data)
    {
        JobImage::create($data);
    }

    public function update(array $data)
    {
        $jobImage = JobImage::where('job_id', $data['job_id'])->first();
        if ($jobImage) {
            $jobImage->update($data);
        } else {
            JobImage::create($data);
        }
    }
}
