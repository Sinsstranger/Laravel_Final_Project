<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\Interfaces\PropertyInterface;
use App\Services\PropertiesServices;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
    public function properties(): View
    {
        $allProperties = $this->propertyServices->allProperties();
        return \view('properties/index', ['allProperties' => $allProperties]);
    }

    public function show(Property $property): View
    {
        return \view('properties/show', ['property' => $property]);
    }
}
