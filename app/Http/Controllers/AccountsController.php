<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    protected $redirectTo = '/';

    public function index(Request $request)
    {
        return view('signin.signin');
    }


    public function signin(Request $request)
    {
        return view('signin.signin');
    }


    public function signout(Request $request)
    {
        return view('signin.signin');
    }
}
