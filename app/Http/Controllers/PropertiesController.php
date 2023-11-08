<?php

namespace App\Http\Controllers;


use App\Http\Requests\AddressRequest;
use App\Http\Requests\PropertiesRequest;
use App\Models\Address;
use App\Models\Property;
use App\Services\Interfaces\PropertyInterface;
use App\Services\Interfaces\UserInterface;
use App\Services\PropertiesServices;

use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PropertiesController extends Controller
{

    public function __construct
    (
        protected PropertiesServices $propertyServices,
        protected UserInterface $usersServices,
    ){}
    public function index(): View
    {
        $propertiesUser = $this->propertyServices->getPropertiesByUserId(Auth::user()->getAuthIdentifier());
        return \view('user/properties/index', ['propertiesUser' => $propertiesUser]);
    }
    public function edit(Property $property): View
    {
        $categoriesProperty = $this->propertyServices->getAllCategoriesProperty();
        $user = $this->usersServices->getUser(Auth::user()->getAuthIdentifier());
        return \view('user/properties/create', [
            'property' => $property,
            'categories' => $categoriesProperty,
            'user' => $user,
        ]);
    }
    public function create(): View
    {
        $user = $this->usersServices->getUser(Auth::user()->getAuthIdentifier());
        $categoriesProperty = $this->propertyServices->getAllCategoriesProperty();

        return \view('user/properties/create', ['user' => $user, 'categories' => $categoriesProperty]);
    }

    public function store(PropertiesRequest $request)
    {

        $address = $this->propertyServices->createAddress($request);

        $propertySave = $this->propertyServices->createProperty($request, $address);
        if ($propertySave) {
            return redirect()->route('user.properties.index');
        }
        return back()->with('error', 'Не удалось создать объявление');
    }
}
