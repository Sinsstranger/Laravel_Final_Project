<?php

namespace App\Http\Controllers;


use App\Http\Requests\PropertiesRequest;
use App\Models\Property;
use App\Services\PropertiesServices;

use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PropertiesController extends Controller
{

    public function __construct
    (
        private readonly PropertiesServices $propertyServices,
        private UsersServices $usersServices,
    ){}
    public function index(): View
    {
        $propertiesUser = $this->propertyServices->getPropertiesByUserId(Auth::user()->getAuthIdentifier());
        return \view('user/properties/index', ['propertiesUser' => $propertiesUser]);
    }
    public function edit(Property $property): View
    {
        $categoriesProperty = $this->propertyServices->getAllCategoriesProperty();
        return \view('user/properties/create', ['property' => $property, 'categories' => $categoriesProperty]);
    }
    public function create(): View
    {
        $user = $this->usersServices->getUser(Auth::user()->getAuthIdentifier());
        $categoriesProperty = $this->propertyServices->getAllCategoriesProperty();

        return \view('user/properties/create', ['user' => $user, 'categories' => $categoriesProperty]);
    }
    public function store(PropertiesRequest $request): View
    {
        return \view('properties/index');
    }
}
