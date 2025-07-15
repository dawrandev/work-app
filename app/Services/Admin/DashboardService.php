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

    public function stats()
    {
        try {
            return $this->dashboardRepository->stats();
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
}
