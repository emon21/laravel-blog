<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;

class AdminController extends Controller
{

   //login from
   public function getLogin()
   {
      return view('backend.auth.login');
   }

   //login success
   public function postLogin(Request $req)
   {
      $req->validate([
         'email' =>'required|email',
         'password' => 'required',
      ]);
      $validated = auth()->attempt([
'email' =>$req->email,'password' =>$req->password,'user_type' => 1
      ]);

      if ($validated) {
         return redirect()->route('dashboard')->with('success','Login Successfull');
      }
      else{
         return redirect()->back()->with('error','Sorry Access Denie Not Login');
         
      }
      
   }

   //logout
   public function logout()
   {
      auth()->logout();
      return redirect()->route('getLogin')->with('success','You have been Successfull logged out');

   }

   //after login view page
   public function dashboard()
   {
      return view('backend.dashboard');
   }
    public function index()
    {
        return view('backend.login');
    }

   
}
