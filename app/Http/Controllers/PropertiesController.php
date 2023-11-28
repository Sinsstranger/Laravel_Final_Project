<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertiesRequest;
use App\Models\Property;
use App\Services\Interfaces\UserInterface;
use App\Services\PropertiesServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class PropertiesController extends Controller
{

    public function __construct
    (
        protected PropertiesServices $propertyServices,
        protected UserInterface $usersServices,
    ){}
    public function index(): View
    {
        $user = $this->usersServices->getUser(Auth::user()->getAuthIdentifier());

        $propertiesUser = $this->propertyServices->getPropertiesByUserId(Auth::user()->getAuthIdentifier());

        return \view('user/properties/index', [
            'propertiesUser' => $propertiesUser]);
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
            return redirect()->route('user.properties.index')->with('success', 'Объявление опубликовано');
        }
        return back()->with('error', 'Не удалось создать объявление');
    }
    public function update(PropertiesRequest $request, Property $property): RedirectResponse
    {

         $saveProperty = $this->propertyServices->updateProperty($request, $property);
         if ($saveProperty) {
             return redirect()->route('user.properties.index')->with('success', 'Объявление успешно отредактировано');
         }
         return back()->with('error', 'Не удалось внести изменения');

    }
    public function destroy(Property $property): RedirectResponse
    {
        $deleteProperty = $this->propertyServices->destroyProperty($property);
        if ($deleteProperty) {
            return redirect()->route('user.properties.index')->with('success', 'Объявление удалено');
        }
        return back()->with('error', 'Объявление не удалено');


            // try {
                
            //     $property->delete();


            //     return response()->json('ok');

            // } catch (\Exception $e) {
            //     Log::error($e->getMessage(), $e->getTrace());
            //     return response()->json('error', 400);
            // }
    }

}
