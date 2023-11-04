<?php

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
     * @return JsonResponse
     */
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        // TODO: Возможно следукт вынести в отдельный сервис!
        $searchString = $request->get('search') ?? null;
        $properties = $searchString ? (new PropertiesServices(new Property()))->getPropertiesByContent($searchString) : null;
        return response()->json(["payload" => ($properties !== null && count($properties) >= 1) ? $properties : false]);
    }
}
