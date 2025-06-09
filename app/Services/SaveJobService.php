<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SaveJobService
{
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
}
