<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use function ddd;
use function view;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $events = Event::query()->orderByDesc('created_at')->get();
        return view('admin/index',['eventsList' => $events]);
    }
}
