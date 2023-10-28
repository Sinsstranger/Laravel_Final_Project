<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertiesController extends Controller
{
    public function index(): View
    {
        return \view('properties/index');
    }
    public function create(Property $property): View
    {
        return \view('properties/index');
    }
}
