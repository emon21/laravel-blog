<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('user.layouts.index');
    }
    public function UserSetting()
    {
        return view('user.layouts.blank');
    }
    public function UserLogin()
    {
        return view('user.user_login');
    }
}
