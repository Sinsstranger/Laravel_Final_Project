<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    private Property $property;

    public function __construct(Property $property){
        $this->property = $property;
    }

    public function index(): View
    {
        $allProperties = $this->property->all();

        return \view('welcome', ['allProperties' => $allProperties]);
    }

    public function store(Request $store): View
    {
        return \view('welcome');
    }
}
