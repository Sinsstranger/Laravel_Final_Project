<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Deal\EditRequest;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $deals = Deal::query()
            ->status()
            ->get();
        return \view('admin.deals.index', [
            'deals' => $deals,
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal): View
    {
        return \view('admin.deals.edit',['deal' => $deal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Deal $deal)
    {
        $data = $request->only([
            'property_id ',
            'tenant_id',
            'rent_starts_at',
            'rent_ends_at',
            'rent_costs',
            'guests',
            'registration',
            'status_id'
        ]);

        $deal->fill($data);
        if ($deal->save()) {
            return redirect()->route('admin.deals.edit', $deal)->with('success', 'Объявление успешно изменено');
        }
        return back()->with('error', 'Объявление не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        try{
            $deal->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
