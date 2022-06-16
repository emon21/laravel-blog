<?php

namespace App\Http\Controllers;

use App\Models\Commant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Post;

class CommantController extends Controller
{
    public function comment()
    {
   
     // $post = Post::with('category')->Where('slug',$slug)->first();
      return view('frontend.single_post',compact('comment'));

     
    }

    public function UserComment(Request $request)
    {
 // return $request;
     $user = Auth::user()->id;
     
     //user insert
     $comment = Commant::create([
        'user_id' => $user,
        'post_id' => $request->post_id,
        'comment' => $request->comment,
     ]);
     $comment->save();
    return redirect()->back();

    }


    public function index()
    {
        
    }
    
    public function create()
    {
      
    }
    
    public function store(Request $request)
    {
        
    }
   
    public function show(Commant $commant)
    {
        
    }

    public function edit(Commant $commant)
    {
       
    }

    public function update(Request $request, Commant $commant)
    {
       
    }
    
    public function destroy(Commant $commant)
    {
        
    }
}
