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
        return $this->property->getAllProperties();
    }

    public function showProperty(): Property
    {
        // TODO: Implement showProperty() method.
    }

    public function getPropertiesByUserId(int $user_id): Collection
    {
        return $this->property->query()->where('user_id', $user_id)->orderByDesc('created_at')->get();
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
            $imagesArray = $this->getUrlsPhotoArray($request);
            $dataProperty['photo'] = $imagesArray;
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
    public function urlImage($request): string
    {
        $path = Storage::putFile("public/images/property/", $request);
        return Storage::url($path);
    }
    public function updateProperty(PropertiesRequest $request, Property $property): bool
    {
        $dataProperty = $request->only('title','category_id', 'number_of_rooms', 'number_of_guests', 'description' , 'photo', 'daily_rent', 'price_per_day', 'address_id' , 'user_id', 'is_temporary_registration_possible');

        if ($request->file('photo')) {
            $imagesArray = $this->getUrlsPhotoArray($request);
            $dataProperty['photo'] = $imagesArray;
        }
        return $this->property->updatePropertyModel($dataProperty, $property);
    }
    public function getUrlsPhotoArray(PropertiesRequest $request): array
    {

        $imagesArray = [];
        foreach($request->file('photo') as $photo) {
            $url = $this->urlImage($photo);
            $imagesArray[] = $url;
        }
        return $imagesArray;
    }
    public function destroyProperty(Property $property): bool
    {
        return $this->property->deleteProperty($property);
    }
}
