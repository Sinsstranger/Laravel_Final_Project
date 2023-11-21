<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserEditRequest;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function back;
use function redirect;
use function view;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::query()//извлечение всех пользователей кроме авторизованного(себя)
                ->where('id', '!=', Auth::id())
                ->get();
        return view('admin.users.index', ['usersList' => $users]);
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
    public function show(User $user)
    {
        $properties = Property::query()->where('user_id','=',$user->id)->get();
        return \view('admin.users.show')->with([
            'user' => $user,
            'properties' => $properties,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return \view('admin.users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequest $request, User $user)
    {
        $data = $request->only(['name','email']);
        $user->fill($data);
        if($request->is_admin === 'true'){
            $user->is_admin = 1;
        }else{
            $user->is_admin = 0;
        }
        if ($user->save()) {
            return redirect()->route('admin.users.edit',$user)->with('success', 'Пользователь успешно изменен');
        }
        return back()->with('error', 'Пользователя не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //dd($user);
        try{
          
           $user->delete();
            
           return response()->json('ok');
       } catch (Exception $ex) {
           Log::error($ex->getMessage(), $ex->getTrace());
           return response()->json('error', 400);
       }
    }
}
