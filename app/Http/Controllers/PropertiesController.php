<?php

namespace App\Http\Controllers;


use App\Services\PropertiesServices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PropertiesController extends Controller
{

    public function __construct
    (
        private readonly PropertiesServices $propertyServices
    ){}
    public function index(): View
    {
        $propertiesUser = $this->propertyServices->getPropertiesByUserId(Auth::user()->getAuthIdentifier());
        return \view('user/properties/index', ['propertiesUser' => $propertiesUser]);
    }
    public function store(Request $store): View
    {
        return \view('properties/index');
    }
}
