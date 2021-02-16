<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        return view('reports.index');
    }
}
