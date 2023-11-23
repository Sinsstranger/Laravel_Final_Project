<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class FavouritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return \view('user/favourites/index', [
//            'favouritesUser' => $favouritesUser]);
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
    public function store(Request $request, $property, $action)
    {
        if(Auth::check()) {
            $userId = Auth::user()->getAuthIdentifier();

            if ($action == 'add') {
                DB::table('favourites')->insert(['fav_property_id'=>$property, 'fav_user_id'=>$userId]);
                return response()->json('add');
            } elseif ($action == 'remove') {
                DB::table('favourites')
                    ->where('fav_property_id', '=', $property)
                    ->where('fav_user_id', '=', $userId)
                    ->delete();
                return response()->json('remove');
            }
        }

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
