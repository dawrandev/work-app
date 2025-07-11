<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class UserService
{

    public function __construct(protected UserRepository $userRepository)
    {
        // 
    }

    public function getUsers()
    {
        try {
            return $this->userRepository->getAll();
        } catch (Exception $e) {
            Log::error('Error getting users: ' . $e->getMessage());
        }
    }
}
