<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function getUser(int $user): User;
}
