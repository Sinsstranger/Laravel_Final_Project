<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserInterface;

class UsersServices implements UserInterface
{
    public function __construct(
        private User $userModel,
    ){}

    public function getUser(int $user_id): User
    {
        return $this->userModel->getUserModel($user_id);
    }
}
