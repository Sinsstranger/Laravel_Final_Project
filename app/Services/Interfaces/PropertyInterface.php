<?php

namespace App\Services\Interfaces;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

interface PropertyInterface
{
    public function showProperty(): Property;
}
