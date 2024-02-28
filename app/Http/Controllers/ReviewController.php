<?php
/**
 * Правки:
 * 1. Использован Auth::user() вместо User::find(Auth::id()) для получения текущего пользователя.
 * 2. Использован $request->input('property_id') вместо $request->only('property_id').
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $property_id = $request->input('property_id');
        $property = Property::find($property_id);

        return view('reviews.create', ['property' => $property]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['rating', 'description', 'property_id']);
        $data['author_id'] = Auth::id();

        $review = new Review($data);
        if ($review->save()) {
            return redirect()->route('user.deals.index')->with('success', 'Отзыв успешно добавлен');
        }

        return back()->with('error', 'Не удалось сохранить отзыв');
    }
}
