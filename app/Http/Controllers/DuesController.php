<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuesController extends Controller
{
    public function index(Request $request)
    {
        return view('dues.index');
    }
}
