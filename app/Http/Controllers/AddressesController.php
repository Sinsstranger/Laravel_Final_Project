<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function store(Request $request)
    {
        dump('Он дошел до адреса!!!');
            dd($request);
    }
}
