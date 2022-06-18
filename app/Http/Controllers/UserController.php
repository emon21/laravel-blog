<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;

class UserController extends Controller
{

    /* ========================== User Crud Function =========================== */

    public function dashboard()
    {
      return view('frontend.user.home');

     // return view('user.layouts.index');
   }
   
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

      //user Update
      $user->name = $request->name; 
      $user->email = $request->email; 
      //$user->password = bcrypt($request->password);
      //Changed User Password
      if ($request->has('password') && $request->password !== null) {
         $user->password = bcrypt($request->password);
      }
      $user->save();

      Session::flash('status','User Updated Successfully');
      return redirect()->route('user.index');
   }

   //User view
   public function userView(User $user)
   {
    
     // $user = Auth::user();
    // return $user->name;
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


    // User Crud

    public function insert()
    {
      $tags = Tag::all();
      $catgories = Category::all();
      return view('frontend.user.user_post',compact('tags','catgories'));
    }

    public function createpost(Request $request)
    {
      //return $request->all();


      $user = Auth::user()->id;
      $post = Post::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->title,
        'image' => 'backend/blog/default.jpg',
        'category_id' => $request->category_list,
        'user_id' => $user,
        'status' => $request->status,
     ]);

     $post->tags()->attach($request->tags);
   
     if($request->has('post_picture')) {

     //    $imageName = time().'.'.$request->post_picture->extension();  
    
     //    $request->post_picture->move(public_path('backend/blog/'), $imageName);
     //   return $post->imageName;

        $filename = time() . '.' .$request->post_picture->getClientOriginalextension();
      //$request->post_picture->move('backend/blog/', $filename);
        $request->post_picture->move(public_path('backend/blog/'), $filename);
        $post->image = 'backend/blog/'.$filename;
        $post->save();
     }
     return back();
    }


    public function postlist()
    {
      $userID = Auth::user()->id;
      $userPosts = Post::with('user')->where('user_id',$userID)->Paginate(10);
      // $category = Category::withCount('posts')->where('slug',$slug)->first();

    //return $userPosts->count();
      return view('frontend.user.user_post_list',compact('userPosts'));
    }
    /* ========================== User Profile Function =========================== */

    //User Profile

    public function UserProfile()
    {
      
      $user = Auth::user();
      return view('frontend.user.user_profile',compact('user'));
    }

    public function UserUpdate(Request $request)
    {
       $user = Auth::user();
      //validation
      $this->validate($request,[
         'name' => 'required',
         'email' => "sometimes|email|unique:users,email,$user->id",
         'password' => 'sometimes|nullable|min:8',
         'image' => 'sometimes|nullable|image|max:2048',
      ]);
      
      //user data save
      $user->name = $request->name; 
      $user->email = $request->email; 
      $user->description = $request->desc; 
      
      //Changed User Password
      if ($request->has('password') && $request->password !== null) {
         $user->password = bcrypt($request->password);
         
      }

      //User Profile Change
      if($request->hasFile('user_picture')) { 
         // if(file_exists($user->image)){
         //    unlink($user->image);
         //    }
         $filename = time() . '.' .$request->user_picture->getClientOriginalextension();
         $request->user_picture->move(public_path('backend/user/'), $filename);
         $user->image = 'backend/user/'.$filename;
      }

      $user->save();
      Session::flash('update','User Profile Changed Successfully');
      return redirect()->route('UserProfile');
    }


    /* ========================== Admin Profile Function =========================== */ 

    //Admin Profile

   public function adminProfile()
   {
      $user = Auth::user();
      return view('backend.user.profile',compact('user'));
   }

    //User Profile Update
    public function AdminUpdate(Request $request)
    {
      $user = Auth::user();
      //validation
      $this->validate($request,[
         'name' => 'required',
         'email' => "sometimes|email|unique:users,email,$user->id",
         'password' => 'sometimes|nullable|min:8',
         'image' => 'sometimes|nullable|image|max:2048',
      ]);
      
      //user data save
      $user->name = $request->name; 
      $user->email = $request->email; 
      $user->description = $request->desc; 
      
      //Changed User Password
      if ($request->has('password') && $request->password !== null) {
         $user->password = bcrypt($request->password);
         
      }

      //User Profile Change
      if($request->hasFile('user_picture')) { 
         // if(file_exists($user->image)){
         //    unlink($user->image);
         //    }
         $filename = time() . '.' .$request->user_picture->getClientOriginalextension();
         $request->user_picture->move(public_path('backend/user/'), $filename);
         $user->image = 'backend/user/'.$filename;
      }

      $user->save();
      Session::flash('status','User Profile Changed Successfully');
      return redirect()->route('user.index');

    }



}
