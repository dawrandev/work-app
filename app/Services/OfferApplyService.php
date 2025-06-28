<?php

namespace App\Services;

use App\Repositories\OfferApplyRepository;

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
        $hasApplied = $this->offerApplyRepository->hasUserAppliedToOffer($userId, $offerId);

        if ($hasApplied) {
            return [
                'can_apply' => false,
                'message' => 'Siz bu taklifga allaqachon ariza bergan ekansiz!'
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
                    'message' => $canApply['message']
                ];
            }

            $this->offerApplyRepository->createApplication($data);

            return [
                'success' => true,
                'message' => 'Ariza muvaffaqiyatli yuborildi!'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Arizani yuborishda xatolik yuz berdi. Qaytadan urinib ko\'ring.'
            ];
        }
    }

    public function getUserApplications(int $userId)
    {
        return $this->offerApplyRepository->getUserApplications($userId);
    }
}
