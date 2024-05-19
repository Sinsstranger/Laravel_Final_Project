<?php
/**
 * Правки:
 * 1. Форматирование кода для повышения читаемости.
 * 2. Использован метод Auth::id() вместо Auth::user()->getAuthIdentifier().
 * 3. Использован метод when для более чистого условия в запросе Property::filter.
 * 4. Убраны неиспользуемые комментарии.
 * 5. В view методе использован массив для передачи параметров для улучшения читаемости кода.
 */
namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\Interfaces\UserInterface;
use App\Services\PropertiesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Filters\PropertyFilter;

class HomeController extends Controller
{
    public function __construct(
        private PropertiesServices $propertyServices,
        protected UserInterface $usersServices
    ) {}

    public function index(): View
    {
        $allProperties = $this->propertyServices->allProperties();

        return view('home', [
            'allProperties' => $allProperties,
            'title' => 'Сайт аренды жилья - Главная страница'
        ]);
    }

    public function store(Request $store): View
    {
        return view('home');
    }

    public function properties(PropertyFilter $request): View
    {
        $userId = Auth::id();
        $properties = Property::filter($request)
            ->when(Auth::check(), function ($query) use ($userId) {
                $query->leftJoin('favourites as f', function ($join) use ($userId) {
                    $join->on('f.fav_property_id', '=', 'properties.id')
                        ->where('f.fav_user_id', '=', $userId);
                });
            })
            ->paginate(9);

        return view('properties/index', [
            'title' => 'props',
            'properties' => $properties
        ]);
    }

    public function show(Property $property): View
    {
        $categories = $this->propertyServices->getAllCategoriesProperty();
        return view('properties/show', [
            'property' => $property,
            'categories' => $categories
        ]);
    }
}
