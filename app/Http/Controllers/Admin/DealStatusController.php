<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\DealStatus;

class DealStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dealStatuses = DealStatus::all();
        return view('admin.dealStatuses.index')->with(['dealStatuses' => $dealStatuses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dealStatuses.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->flash();
        $data = $request->only('name');
        $dealStatus = new DealStatus($data);

        if($dealStatus->save()) {
            return redirect()->route('admin.dealStatuses.index')->with('success', 'Статус успешно добавлен');
        }
        return back()->with('error', 'Не удалось добавить статус');
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
    public function edit(DealStatus $dealStatus): view
    {
        return view('admin.dealStatuses.edit')
            ->with(['dealStatus' => $dealStatus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DealStatus $dealStatus)
    {
        $data = $request->only('name');
        $dealStatus->fill($data);
        if($dealStatus->save()) {
            return redirect()->route('admin.dealStatuses.index')->with('success', 'Статус успешно отредактирован');
        }
        return back()->with('error', 'Не удалось добавить статус');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DealStatus $dealStatus)
    {
        if($dealStatus->delete()) {
            return redirect()->route('admin.dealStatuses.index')->with('success', 'Статус успешно удален');
        }
        return back()->with('error', 'Не удалось удалить статус');
    }
}
