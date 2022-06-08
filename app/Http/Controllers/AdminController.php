<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.login');
    }

    public function home()
    {
        return view('backend.index');
    }
}
