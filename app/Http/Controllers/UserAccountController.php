<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function index(Request $request)
    {
        return view('useraccount.index');
    }
}
