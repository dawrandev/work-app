<?php

namespace App\Services;

use App\Repositories\OfferApplyRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class OfferApplyService
{
    public function __construct(private OfferApplyRepository $offerApplyRepository) {}

    public function checkApplyStatus(int $userId): array
    {
        $jobs = $this->offerApplyRepository->getUserJobs($userId);

        if (!$jobs || $jobs->isEmpty()) {
            return ['status' => 'no_jobs'];
        }

        if ($jobs->count() === 1) {
            return [
                'status' => 'single_job',
                'job' => $jobs->first()
            ];
        }

        return [
            'status' => 'multiple_jobs',
            'jobs' => $jobs
        ];
    }

    public function canUserApply(int $userId, int $offerId): array
    {
        // Check user's jobs
        $userJobs = $this->offerApplyRepository->getUserJobs($userId);

        if (!$userJobs || $userJobs->isEmpty()) {
            return [
                'can_apply' => false,
                'message' => __('Your job was not found. Please create a job first')
            ];
        }

        $activeJob = $userJobs->where('approval_status', 'approved')->first();

        if (!$activeJob) {
            return [
                'can_apply' => false,
                'message' => __('Your job has not been approved yet. You can apply after it is approved')
            ];
        }

        $hasApplied = $this->offerApplyRepository->hasUserAppliedToOffer($userId, $offerId);

        if ($hasApplied) {
            return [
                'can_apply' => false,
                'message' => __('You have already applied for this offer!')
            ];
        }

        return ['can_apply' => true];
    }

    public function createApplication(array $data): array
    {
        try {
            if (!isset($data['user_id'])) {
                $data['user_id'] = auth()->id();
            }

            $canApply = $this->canUserApply($data['user_id'], $data['offer_id']);

            if (!$canApply['can_apply']) {
                return [
                    'success' => false,
                    'message' => __($canApply['message'])
                ];
            }

            $this->offerApplyRepository->createApplication($data);

            return [
                'success' => true,
                'message' => __('Application submitted successfully!')
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => __('There was an error submitting the application. Please try again.')
            ];
        }
    }

    public function getUserApplications(int $userId)
    {
        return $this->offerApplyRepository->getUserApplications($userId);
    }

    public function applicants($offerId)
    {
        return $this->offerApplyRepository->getApplicants($offerId);
    }

    public function updateApprovalStatus($id, $status)
    {
        try {
            return $this->offerApplyRepository->updateStatus($id, $status);
        } catch (Exception $e) {
            Log::error('Offer approval status error:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
