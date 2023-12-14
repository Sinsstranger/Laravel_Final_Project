<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $feedbacks = Feedback::all();
        return \view('admin.feedbacks.index', [
            'feedbacks' => $feedbacks,
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
        $data = $request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
            'message'
        ]);

        $feedback = new Feedback($data);

        if($feedback->save()) {
            return redirect()->route('home');
//                ->with('success', 'Запись успешно сохранена');
        }

        return back();
//            ->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return \view('admin.feedbacks.show',['feedback' => $feedback]);
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
    public function destroy(Feedback $feedback)
    {
        try{
            $feedback->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
