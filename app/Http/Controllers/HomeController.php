<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\Interfaces\PropertyInterface;
use App\Services\PropertiesServices;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Filters\PropertyFilter;

class HomeController extends Controller
{


    public function __construct
    (
        private readonly PropertiesServices $propertyServices
    ) {}

    protected function getProps(){
        return $this->propertyServices->allProperties();
    }

    public function index(): View
    {
        $allProperties = $this->getProps();

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
        return \view('properties/show', ['property' => $property]);
    }
}
