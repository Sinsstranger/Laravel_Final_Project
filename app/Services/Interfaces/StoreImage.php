<?php

namespace App\Services\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

interface StoreImage
{
    public function StoreImage(Request $request, User $user, string $requestField): string;

}
