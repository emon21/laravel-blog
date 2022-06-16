<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        return view('backend.login');
    }

    public function home()
    {
      $message = '';

     // $data['created_at'] = Carbon::format('m/d/Y');
    // return $data->careated_at->format('d-m-Y');
     
        return view('backend.index',compact('message'));
    }
}
