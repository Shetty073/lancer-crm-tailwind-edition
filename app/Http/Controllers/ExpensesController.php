<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index(Request $request)
    {
        return view('expenses.index');
    }
}
