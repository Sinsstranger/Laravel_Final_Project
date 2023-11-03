<?php

namespace App\Services;

use App\Models\Property;
use App\Models\User;
use App\Services\Interfaces\PropertyInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class PropertiesServices implements PropertyInterface
{

    public function __construct
    (
        private Property $property
    ) {}

    public function allProperties(): Collection
    {
        return $this->property->all();
    }

    public function showProperty(): Property
    {
        // TODO: Implement showProperty() method.
    }

    public function getPropertiesByUserId(int $user_id): Collection
    {
        return $this->property->query()->where('user_id', $user_id)->get();
    }
    public function getPropertiesByContent(string $content): Collection
    {
        return $this->property->query()->where('title', 'LIKE', "%{$content}%", 'or')
            ->where('description', 'LIKE', "%{$content}%", 'or')
            ->where('price_per_day', 'LIKE', "%{$content}%")
            ->get();
    }
}
