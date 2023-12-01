<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Address\CreateRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $addresses = Address::all();
        return \view('admin.addresses.index', [
            'addresses' => $addresses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        $data = $request->only([
            'country',
            'place',
            'street',
            'house_number',
            'flat_number'
        ]);

        $address = new Address($data);

        if($address->save()) {
            return redirect()->route('admin.addresses.index')
                ->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address): View
    {
        return \view('admin.addresses.create',['address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRequest $request, Address $address)
    {
        $data = $request->only([
            'country',
            'place',
            'street',
            'house_number',
            'flat_number'
        ]);

        $address->fill($data);
        if ($address->save()) {
            return redirect()->route('admin.addresses.edit', $address)->with('success', 'Объявление успешно изменено');
        }
        return back()->with('error', 'Объявление не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        try{
            $address->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
