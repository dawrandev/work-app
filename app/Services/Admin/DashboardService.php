<?php

namespace App\Services\Admin;

use App\Repositories\Admin\DashboardRepository;
use Exception;

class DashboardService
{
    public function __construct(protected DashboardRepository $dashboardRepository)
    {
        // 
    }

    public function firstCardStats()
    {
        try {
            return $this->dashboardRepository->firstCardStats();
        } catch (Exception $e) {
            report($e);
            throw new Exception('An error occurred while retrieving statistics.');
        }
    }

    public function getMonthlyData($period)
    {
        try {
            return $this->dashboardRepository->getMonthlyData($period);
        } catch (Exception $e) {
            report($e);
            throw new Exception('An error occurred while retrieving monthly data.');
        }
    }

    public function getCategoryDistribution()
    {
        try {
            return $this->dashboardRepository->getCategoryDistribution();
        } catch (Exception $e) {
            report($e);
            throw new Exception('An error occurred while retrieving Category distribution:' . $e->getMessage());
        }
    }

    public function getDistrictDistribution()
    {
        try {
            return $this->dashboardRepository->getDistrictDistribution();
        } catch (Exception $e) {
            report($e);
            throw new Exception('An error occurred while retrieving District distribution.');
        }
    }

    public function secondCardStats($timeFilter, $categoryId, $districtId)
    {
        return [
            'users' => $this->dashboardRepository->getUsersCount($timeFilter, $categoryId, $districtId),
            'jobs' => $this->dashboardRepository->getJobsCount($timeFilter, $categoryId, $districtId),
            'offers' => $this->dashboardRepository->getOffersCount($timeFilter, $categoryId, $districtId),
            'applies' => $this->dashboardRepository->getAppliesCount($timeFilter, $categoryId, $districtId),
            'accepted_applies' => $this->dashboardRepository->getAcceptedAppliesCount($timeFilter, $categoryId, $districtId),
        ];
    }
}
