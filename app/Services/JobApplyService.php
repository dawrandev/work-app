<?php

namespace App\Services;

use App\Repositories\JobApplyRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class JobApplyService
{
    public function __construct(private JobApplyRepository $jobApplyRepository) {}

    public function checkApplyStatus(int $userId): array
    {
        $offers = $this->jobApplyRepository->getUserOffers($userId);

        if (!$offers || $offers->isEmpty()) {
            return ['status' => 'no_offers'];
        }

        if ($offers->count() === 1) {
            return [
                'status' => 'single_offer',
                'offer' => $offers->first()
            ];
        }

        return [
            'status' => 'multiple_offers',
            'offers' => $offers
        ];
    }

    public function canUserApply(int $userId, int $jobId): array
    {
        $userOffers = $this->jobApplyRepository->getUserOffers($userId);

        if (!$userOffers || $userOffers->isEmpty()) {
            return [
                'can_apply' => false,
                'message' => __('Your offer was not found. Please create an offer first.')
            ];
        }

        $activeOffer = $userOffers->where('approval_status', 'approved')->first();

        if (!$activeOffer) {
            return [
                'can_apply' => false,
                'message' => __('Your offer has not been confirmed yet. You can submit an application after the offer is confirmed.')
            ];
        }

        // Check if user has already applied
        $hasApplied = $this->jobApplyRepository->hasUserAppliedToJob($userId, $jobId);

        if ($hasApplied) {
            return [
                'can_apply' => false,
                'message' => __('You have already applied for this job!')
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

            $canApply = $this->canUserApply($data['user_id'], $data['job_id']);

            if (!$canApply['can_apply']) {
                return [
                    'success' => false,
                    'message' => __($canApply['message'])
                ];
            }

            $this->jobApplyRepository->createApplication($data);

            return [
                'success' => true,
                'message' => __('Application sent successfully!')
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
        return $this->jobApplyRepository->getUserApplications($userId);
    }

    public function applicants($jobId)
    {
        return $this->jobApplyRepository->getApplicants($jobId);
    }

    public function updateApprovalStatus($id, $status)
    {
        try {
            return $this->jobApplyRepository->updateStatus($id, $status);
        } catch (Exception $e) {
            Log::error('Job approval status error:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
