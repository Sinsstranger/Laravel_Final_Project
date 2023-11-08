<?php

namespace App\Services;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\PropertiesRequest;
use App\Models\Address;
use App\Models\Category;
use App\Models\Property;
use App\Models\User;
use App\Services\Interfaces\PropertyInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    public function createProperty(PropertiesRequest $request, Address $address = null): bool
    {
        $dataProperty = $request->only('title','category_id', 'number_of_rooms', 'number_of_guests', 'description' , 'photo', 'daily_rent', 'price_per_day', 'address_id' , 'user_id', 'is_temporary_registration_possible');
        if ($request->file('photo')) {
            $url = $this->urlImage($dataProperty, $request);
            $dataProperty['photo'] = $url;
        }
        $user = $this->user->find(Auth::user()->getAuthIdentifier());
        $dataProperty['address_id'] = $dataProperty['address_id'] ?? $address->id;
        $dataProperty['user_id'] = $user->id;

        return $this->property->createModel($dataProperty);
    }
    public function createAddress(PropertiesRequest $requestAddresses): Address
    {
        $dataAddress = $requestAddresses->only('country', 'place', 'street' , 'house_number', 'flat_number');
        return $this->address->createModel($dataAddress);
    }
    public function urlImage(array $data, $request): string
    {
        $request->validate([
            'image' => ['sometimes', 'image', 'mimes:jpeg,bmp,png']
        ]);
        $path = Storage::putFile("public/images/property/{$data['photo']}", $request->file('photo'));
        return Storage::url($path);
    }
}
