<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        return view('clients.index');
    }
}
