<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealsRequest;
use App\Http\Requests\PropertiesRequest;
use App\Services\DealsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DealsController extends Controller
{
    public function __construct(protected DealsServices $dealsServices)
    {}

    public function index(): View
    {
        $deals = $this->dealsServices->getDealsByUserId(Auth::user()->getAuthIdentifier());

        return \view('user/deals', ['deals' => $deals]);
    }

    public function store(DealsRequest $request)
    {
        $save = $this->dealsServices->createDeal($request);
        if ($save) {
            return redirect()->route('user.properties.index');
        }
        return back()->with('error', 'Не удалось забронировать');
    }

}
