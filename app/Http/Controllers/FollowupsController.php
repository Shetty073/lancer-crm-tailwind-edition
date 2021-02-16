<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowupsController extends Controller
{
    public function index(Request $request)
    {
        return view('followups.index');
    }
}
