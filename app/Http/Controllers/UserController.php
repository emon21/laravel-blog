<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class UserController extends Controller
{

   //user home
    public function index()
    {
         $userlist = User::latest()->Paginate(10);
        return view('backend.user.index',compact('userlist'));
    }

    //user create
    public function create()
    {
        return view('backend.user.index');
    }

    //user store
    public function store(Request $request)
    {
      $this->validate($request,[
         'name' => 'required',
         'email' => 'required|unique:users,email',
         'password' => 'required|min:8',
      ]);

      $user = User::create([
         'name' => $request->name,
         'slug' => Str::slug($request->name),
         'email' => $request->email,
         'password' => bcrypt($request->password),
         'desacription' => $request->desc,
         'user_type' => 0,

      ]);
      Session::flash('created','User Created Successfully');
        return redirect()->back(); 
    }

    //user edit
    public function edit(User $user)
    {
        return view('backend.user.edit',compact('user'));
    }

    //user update
    public function update(Request $request, User $user)
    {
      $this->validate($request,[
         'name' => 'required',
         'email' => "required|unique:users,email,$user->id",
         'password' => 'sometimes|nullable|min:8',
      ]);

      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();
      Session::flash('update','User Update Successfully');
      return redirect()->back();
    }

    //user destroy
    public function destroy(User $user)
    {
      
        if($user){
         $user->delete();
         Session::flash('delete','User Delete Successfully');
        }
        return redirect()->back();
    }


   //  public function UserSetting()
   //  {
   //      return view('user.layouts.blank');
   //  }
   //  public function UserLogin()
   //  {
   //      return view('user.user_login');
   //  }
}
