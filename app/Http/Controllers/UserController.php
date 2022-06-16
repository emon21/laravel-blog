<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

   public function index()
   {

      $users = User::latest()->paginate(10);
      return view('backend.user.index',compact('users'));

   }

   public function create()
   {
      return view('backend.user.create');
   }

   public function store(Request $request)
   {
      //User Validation
      $this->validate($request,[
         'name' => 'required|string|max:255',
         'email' => "required|email|unique:users,email",
         'password' => 'required|min:8',
         'image' => 'sometimes|nullable|image|max:2048',
      ]);
      
      //user insert
      $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => bcrypt($request->password),
         'desacription' => $request->desc,
         'slug' => Str::slug($request->name),
         'user_type' => 0,

      ]);

      //User image upload
      if($request->hasFile('user_picture')) { 
         // if(file_exists($user->image)){
         //    unlink($user->image);
         //    }
         $filename = time() . '.' .$request->user_picture->getClientOriginalextension();
         $request->user_picture->move(public_path('backend/user/'), $filename);
         $user->image = 'backend/user/'.$filename;
         $user->save();
      }

      Session::flash('status','User Created Successfully');
      return redirect()->route('user.index');
     // return redirect('register')->withErrors(, 'login');

   }

   public function edit(User $user)
   {
      return view('backend.user.edit',compact('user'));
   }
   
   public function update(Request $request , User $user)
   {
      //User Validation
      $this->validate($request,[
         'name' => 'required',
         'email' => "required|unique:users,email,$user->id",
         'password' => 'sometimes|nullable|min:8',
      ]);

      //user insert
      $user->name = $request->name; 
      $user->email = $request->email; 
      $user->password = bcrypt($request->password); 
      $user->save();

      Session::flash('status','User Updated Successfully');
      return redirect()->route('user.index');
   }

   //User view
   public function userView(User $user)
   {
    
      return view('backend/user/view',compact('user'));
   }

    //Delete Function
    public function destroy(User $user)
    {
      //user Delete
        if($user){
         $user->delete();
        // Session::flash('delete','User Delete Successfully');
        }
        Session::flash('error','User Delete Successfully');
        return redirect()->route('user.index');
    }

}
