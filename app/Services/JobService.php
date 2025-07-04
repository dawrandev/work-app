<?php

namespace App\Services;

use App\Http\Requests\JobStoreRequest;
use App\Repositories\JobRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobService
{
    public function __construct(
        protected JobRepository $jobRepository
    ) {
        // 
    }

    public function createJob(array $data, $request)
    {
        try {
            DB::transaction(function () use ($data, $request) {
                $data['user_id'] = auth()->id();
                $data['status'] = 'active';
                $data['approval_status'] = 'pending';

                $job = $this->jobRepository->create($data);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs("jobs", $filename, 'public');

                        $job->images()->create([
                            'image_path' => $filename,
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
                // 1. Job ma'lumotlarini yangilash
                $job = $this->jobRepository->update($job, $data);

                // 2. O'chirilishi kerak bo'lgan image'larni handle qilish
                if ($request->has('delete_images')) {
                    $deleteImageIds = $request->input('delete_images');

                    foreach ($deleteImageIds as $imageId) {
                        $image = \App\Models\Image::find($imageId);

                        // Image mavjud va shu job'ga tegishli ekanligini tekshir
                        if ($image && $image->imageable_id === $job->id && $image->imageable_type === Job::class) {
                            // Storage'dan file o'chirish (full path bilan)
                            if (Storage::disk('public')->exists('jobs/' . $image->image_path)) {
                                Storage::disk('public')->delete('jobs/' . $image->image_path);
                            }

                            // Database'dan o'chirish
                            $image->delete();
                        }
                    }
                }

                // 3. Yangi image'larni upload qilish
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $image->storeAs("jobs", $filename, 'public');

                        // Faqat filename saqlash (jobs/ yo'q)
                        $job->images()->create([
                            'image_path' => $filename,
                        ]);
                    }
                }
            });

            return $job;
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
