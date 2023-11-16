<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::query()//извлечение всех пользователей кроме авторизованного(себя)
        ->where('id', '!=', Auth::id())
            ->get();
        return view('admin.properties.index', ['propertiesList' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Property $property)
    {
        return \view('admin.properties.show',['property' => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property): View
    {
        return \view('admin.properties.edit',['property' => $property]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $data = $request->only([
            'title',
            'category_id',
            'number_of_rooms',
            'number_of_guests',
            'description',
            'photo',
            'price_per_day',
            'address_id',
            'user_id',
            'is_temporary_registration_possible',
            'daily_rent'
        ]);
        $property->fill($data);
        if ($property->save()) {
            return redirect()->route('admin.properties.edit', $property)->with('success', 'Объявление успешно изменено');
        }
        return back()->with('error', 'Объявление не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
