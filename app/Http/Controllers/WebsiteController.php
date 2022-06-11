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
       $categoryList = Category::all();
       $postList = Post::all();
       return view('frontend.index',compact('categoryList','postList'));
    }

    //Single Post
    public function SingleCategory()
    {
       return view('frontend.single_category');
    }
    //Single Post
    public function singlePost(Post $post)
    {
       
      $tag = Tag::all();
      $PostList = Post::take(6)->get();
       return view('frontend.single_post',compact('post','tag','PostList'));
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
