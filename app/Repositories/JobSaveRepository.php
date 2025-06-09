<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class JobSaveRepository
{
    public function saveJob(array $data)
    {
        return DB::table('save_jobs')->insert([
            'user_id' => auth()->id(),
            'job_id' => $data['job_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function getUserJobs($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return collect();
        }

        return $user->savedJobs()->paginate(5)->appends(request()->query());
    }
}
