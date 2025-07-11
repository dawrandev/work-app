<?php

namespace App\Services\Admin;

use App\Repositories\Admin\JobRepository;

class JobService
{
    public function __construct(protected JobRepository $jobRepository)
    {
        // 
    }
}
