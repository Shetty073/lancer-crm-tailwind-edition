<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        return view('services.index');
    }
}
