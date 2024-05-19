<?php
/**
 * Правки:
 * 1. Использован метод Auth::id() вместо Auth::user()->getAuthIdentifier().
 * 2. Заменены длинные списки параметров в методах на использование compact.
 * 3. Убраны комментарии и неиспользуемый код.
 */
namespace App\Http\Controllers;

use App\Http\Requests\PropertiesRequest;
use App\Models\Property;
use App\Services\Interfaces\UserInterface;
use App\Services\PropertiesServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PropertiesController extends Controller
{
    protected PropertiesServices $propertyServices;
    protected UserInterface $usersServices;

    public function __construct(PropertiesServices $propertyServices, UserInterface $usersServices)
    {
        $this->propertyServices = $propertyServices;
        $this->usersServices = $usersServices;
    }

    public function index(): View
    {
        $propertiesUser = $this->propertyServices->getPropertiesByUserId(Auth::id());

        return view('user/properties/index', compact('propertiesUser'));
    }

    public function edit(Property $property): View
    {
        $categories = $this->propertyServices->getAllCategoriesProperty();
        $user = $this->usersServices->getUser(Auth::id());

        return view('user/properties/create', compact('property', 'categories', 'user'));
    }

    public function create(): View
    {
        $user = $this->usersServices->getUser(Auth::id());
        $categories = $this->propertyServices->getAllCategoriesProperty();

        return view('user/properties/create', compact('user', 'categories'));
    }

    public function store(PropertiesRequest $request): RedirectResponse
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
    }
}
