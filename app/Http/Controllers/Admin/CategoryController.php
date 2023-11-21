<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        return \view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title'
        ]);

        $category = new Category($data);

        if($category->save()) {
            return redirect()->route('admin.categories.index')
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
    public function edit(Category $category): View
    {
        return \view('admin.categories.create',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->only([
            'title'
        ]);

        $category->fill($data);
        if ($category->save()) {
            return redirect()->route('admin.categories.edit', $category)->with('success', 'Объявление успешно изменено');
        }
        return back()->with('error', 'Объявление не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
