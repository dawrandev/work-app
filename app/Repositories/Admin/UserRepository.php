<?php

namespace App\Repositories\Admin;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->latest()->paginate(10);
    }
}
