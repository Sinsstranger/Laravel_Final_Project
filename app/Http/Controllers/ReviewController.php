<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = User::find(Auth::id());
        $property_id = $request->only('property_id');
        $property = Property::find($property_id);
        return view('reviews.create')->with(['property' => $property[0]]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(
            'rating',
            'description',
            'property_id'
        );

        $data['author_id'] = Auth::id();
        $review = new Review($data);
        if($review->save()) {
            return redirect()->route('user.deals.index')->with('success', 'Отзыв успешно добавлен');
        }
        return back()->with('error', 'Не удалось сохранить отзыв');
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
