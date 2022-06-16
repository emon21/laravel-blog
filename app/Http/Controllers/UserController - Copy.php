<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
        return view('backend.user.create');
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
      //image upload
      if($request->hasFile('user_picture')) { 
         // if(file_exists($user->image)){
         //    unlink($user->image);
         //    }
         $filename = time() . '.' .$request->user_picture->getClientOriginalextension();
         $request->user_picture->move(public_path('backend/user/'), $filename);
         $user->image = 'backend/user/'.$filename;
         $user->save();
      }
      Session::flash('created','User Created Successfully');
        return redirect()->route('user'); 
    }

    //user edit
    public function edit(User $user)
    {
         // return $userprofile = $user->id;

        return view('backend.user.edit',compact('user'));
    }

    //user update
    public function update(Request $request, User $user)
    {
      // $this->validate($request,[
      //    'name' => 'required',
      //    'email' => "required|unique:users,email,$user->id",
      //    'password' => 'sometimes|nullable|min:8',
      // ]);

      $this->validate($request,[
         'name' => 'required',
         'email' => "sometimes|nullable|unique:users,email,$user->id",
         'password' => 'sometimes|nullable|min:8',
         'image' => 'sometimes|nullable|image|max:2048',
      ]);

      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();
      Session::flash('update','User Update Successfully');
      return redirect()->route('user.index');
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

 
                                             /* User Profile Setting */
                                             
    //user Setting
    public function UserSetting()
    {
        return view('user.layouts.blank');
    }
    public function UserLogin()
    {
        return view('user.user_login');
    }


   //user profile
   public function userProfile(User $user)
   {
      return $user;
     // $userprofile = Auth::user()->id;
    //  $user = Auth()->user();

      return view('backend.user.profile',compact('user'));
   }

   //user update
   public function userUpdate(Request $request)
   {
      return $request->all();
      $user = auth()->user();

      $this->validate($request,[
         'name' => 'required',
         'email' => "sometimes|email|unique:users,email,$user->id",
         'password' => 'sometimes|nullable|min:8',
         'image' => 'sometimes|nullable|image|max:2048',
      ]);

      // $user = User::update([
      // 'name' => $request->name,
      // 'email' => $request->email,
      // 'description' => $request->desc,
      // 'name' => $request->name,
      // 'name' => $request->name,
      // ]);

      // $user->name = $request->name;
      // $user->email = $request->email;
     
      // $user->description = $request->desc;
      if ( $request->has('password') && $request->password !== null) {
         $user->password = bcrypt($request->password);
      }
      //image upload
      if($request->hasFile('user_picture')) { 
         // if(file_exists($user->image)){
         //    unlink($user->image);
         //    }
         $filename = time() . '.' .$request->user_picture->getClientOriginalextension();
         $request->user_picture->move(public_path('backend/user/'), $filename);
         $user->image = 'backend/user/'.$filename;
      }
      
      $user->save();
      Session::flash('update','User Profile Update Successfully');
      return redirect()->back();
   }
}
