<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;


class AboutController extends Controller
{
    public function index(): View
    {
        return \view('about');
    }
}
