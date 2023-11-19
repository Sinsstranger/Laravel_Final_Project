<?php

namespace App\Http\Controllers;

use App\Models\Property;

use App\Services\PropertiesServices;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Filters\PropertyFilter;

class HomeController extends Controller
{

    public function __construct
    (
        private PropertiesServices $propertyServices
    ) {}


    public function index(): View
    {
        $allProperties = $this->propertyServices->allProperties();

        return \view('home', ['allProperties' => $allProperties, 'title' => 'Сайт аренды жилья - Главная страница']);
    }


    public function store(Request $store): View
    {
        return \view('home');
    }
    public function properties(PropertyFilter $request): View
    {
        $properties = Property::filter($request)->paginate(9);
        return \view('properties/index', ['title'=>'props', 'properties' => $properties]);
    }

    public function show(Property $property): View
    {
        $categories = $this->propertyServices->getAllCategoriesProperty();
        return \view('properties/show', ['property' => $property, 'categories' => $categories]);
    }
}
