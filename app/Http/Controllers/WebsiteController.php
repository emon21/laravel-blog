<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;

class WebsiteController extends Controller
{

    public function index()
    {
      // $categoryList = Category::where('status',1)->get();
       $post = Post::orderBy('created_at','DESC')->take(5)->get();
       $recentpost = Post::with('category','user')->orderBy('created_at','DESC')->Paginate(9);
       //$postList = Post::all();
       return view('frontend.index',compact('post','recentpost'));
    }

    //Single Post
    public function SingleCategory()
    {
       return view('frontend.single_category');
    }
    //Single Post
    public function singlePost(Post $post, $slug)
    {

      $post = Post::with('category','user')->Where('slug',$slug)->first();
      if($post){
         return view('frontend.single_post',compact('post'));
      }
      else{
         return view('frontend.index');
      }
       
     // $tag = Tag::all();
    //  $PostList = Post::take(6)->get();
       return view('frontend.single_post',compact('post'));
    }

    //Blog LIst
    public function BlogList()
    {
      $categoryList = Category::all();
      $tag = Tag::all();

     // return $categoryList;
      $postList = Post::Paginate(8);
      //return $postList->count('category');
       return view('frontend.blog',compact('categoryList','postList','tag'));
    }


}
