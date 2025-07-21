<?php

namespace App\Services;

use App\Http\Requests\JobStoreRequest;
use App\Models\Job;
use App\Repositories\JobRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
                Log::info('Job update data:', $data);
                Log::info('Delete images:', $request->input('delete_images', []));

                $data['approval_status'] = 'pending';

                $job = $this->jobRepository->update($job, $data);

                if ($request->has('delete_images') && is_array($request->input('delete_images'))) {
                    $deleteImageIds = $request->input('delete_images');

                    foreach ($deleteImageIds as $imageId) {
                        $image = \App\Models\Image::find($imageId);

                        if ($image && $image->imageable_id == $job->id && $image->imageable_type == Job::class) {
                            $fullPath = 'jobs/' . $image->image_path;
                            if (Storage::disk('public')->exists($fullPath)) {
                                Storage::disk('public')->delete($fullPath);
                            }

                            $image->delete();
                            Log::info('Image deleted:', ['image_id' => $imageId]);
                        }
                    }
                }

                if ($request->hasFile('images')) {
                    $currentImagesCount = $job->images()->count();
                    $newImagesCount = count($request->file('images'));

                    if ($currentImagesCount + $newImagesCount > 3) {
                        throw new \Exception(__('Cannot upload :new images. Current images: :current. Maximum allowed: 3', [
                            'new' => $newImagesCount,
                            'current' => $currentImagesCount
                        ]));
                    }

                    foreach ($request->file('images') as $image) {
                        $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('jobs', $filename, 'public');

                        $job->images()->create([
                            'image_path' => $filename,
                        ]);

                        Log::info('New image uploaded:', ['filename' => $filename]);
                    }
                }

                $finalImageCount = $job->images()->count();
                Log::info('Final image count after update:', ['count' => $finalImageCount]);

                if ($finalImageCount > 3) {
                    throw new \Exception(__('Image limit exceeded. Final count: :count', ['count' => $finalImageCount]));
                }
            });

            return $job;
        } catch (Exception $e) {
            Log::error('Job update error:', ['error' => $e->getMessage()]);
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
