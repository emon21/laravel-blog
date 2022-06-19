<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;
use App\Models\Contact;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
   public function index()
   {
      $posts = Post::orderBy('created_at','desc')->take(6)->get();
      $postCount = Post::all()->count();
      $userCount = User::all()->count();
      $categoryCount = Category::all()->count();
      $tagCount = Tag::all()->count();
     // $comments = Comment::Paginate(2);
      $comments = Comment::with('user','post')->orderBy('created_at','DESC')->Paginate(2);

     // $data['created_at'] = Carbon::format('m/d/Y');
    // return $data->careated_at->format('d-m-Y');
   
      return view('backend.index',compact('posts','postCount','userCount','categoryCount','tagCount','comments'));

   }
}
