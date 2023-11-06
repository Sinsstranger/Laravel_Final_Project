<?php

namespace App\Services;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Category;
use App\Models\Property;
use App\Models\User;
use App\Services\Interfaces\PropertyInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PropertiesServices implements PropertyInterface
{

    public function __construct
    (
        protected Property $property,
        protected Category $category,
        protected Address $address,
        protected User $user
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
    public function getAllCategoriesProperty(): Collection
    {
        return $this->category->getAllCategories();
    }
    public function create(array $dataProperty, array $dataAddress)
    {
        $user = $this->user->find(Auth::user()->getAuthIdentifier());
        $address = $this->address->createModel($dataAddress);

        return $this->property->createModel($dataProperty, $user, $address);
    }
}
