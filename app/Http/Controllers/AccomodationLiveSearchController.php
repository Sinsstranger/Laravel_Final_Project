<?php
/**
 * Правки:
 * 1. Используется dependency injection для внедрения PropertiesServices.
 * 2. Использован метод input для получения значения из запроса с более коротким синтаксисом и возможностью указания значения по умолчанию.
 * 3. Заменен метод count на isNotEmpty для более ясного и краткого кода.
 * 4. Удален комментарий // TODO, так как предложено решение вынести логику в отдельный сервис, что уже сделано.
 */
namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\PropertiesServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccomodationLiveSearchController extends Controller
{
    /**
     * Принимает запрос и отдает значение GET параметра search
     * для поиска в базе сервису PropertiesServices
     * @param Request $request
     * @param PropertiesServices $propertiesServices
     * @return JsonResponse
     */
    public function __invoke(Request $request, PropertiesServices $propertiesServices): JsonResponse
    {
        $searchString = $request->input('search', '');
        $properties = $searchString ? $propertiesServices->getPropertiesByContent($searchString) : collect();

        return response()->json(["payload" => $properties->isNotEmpty() ? $properties : false]);
    }
}
