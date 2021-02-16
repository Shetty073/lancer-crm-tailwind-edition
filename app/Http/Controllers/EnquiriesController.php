<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnquiriesController extends Controller
{
    public function index(Request $request)
    {
        return view('enquiries.index');
    }
}
