<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertiesController extends Controller
{
    private Property $property;

    public function __construct(Property $property){
        $this->property = $property;
    }
    public function index(): View
    {
        return \view('properties/index');
    }
    public function store(Request $store): View
    {
        return \view('properties/index');
    }
}
