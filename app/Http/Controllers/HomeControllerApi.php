<?php

namespace App\Http\Controllers;

use App\Services\PropertiesServices;
use Illuminate\Http\Request;

class HomeControllerApi extends Controller
{
    public function __construct
    (
        private readonly PropertiesServices $propertyServices
    ) {}

    protected function getProps(){
        return $this->propertyServices->allProperties();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['title' => 'Сайт аренды жилья - Главная страница', 'accommodation' => $this->getProps()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
