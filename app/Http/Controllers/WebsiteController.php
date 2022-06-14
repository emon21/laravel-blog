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
      $post = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();
      $firstpost = $post->splice(0,2);
      $middlepost = $post->splice(0,1);
      $lastpost = $post->splice(0);

      $footerpost = Post::with('category','user')->inRandomOrder()->limit(4)->get();
      $fristfooterpost = $footerpost->splice(0,1);
      $middlefooterpost = $footerpost->splice(0,2);
      $lastfooterpost = $footerpost->splice(0,1);
     // return $lastpost;
       $recentpost = Post::with('category','user')->orderBy('created_at','DESC')->Paginate(9);
       //$postList = Post::all();
       return view('frontend.index',compact('post','recentpost','firstpost','middlepost','lastpost','fristfooterpost','middlefooterpost','lastfooterpost'));
    }

    //Single Post
    public function SingleCategory($slug)
    {
      //return $slug;
      $category = Category::where('slug',$slug)->first();
      if ($category) {
        //return $category;
        $postlist = Post::where('category_id',$category->id)->paginate(2);
         return view('frontend.single_category',compact('category','postlist'));
      }
      else{
         return redirect()->route('website');
      }

     // return view('frontend.single_category');
       
    }
    //Single Post
    public function singlePost($slug)
    {

      $post = Post::with('category','user')->Where('slug',$slug)->first();
      $posts = Post::with('category','user')->inRandomOrder()->limit(4)->get();
      $category = Category::all();
      $tag = Tag::all();
     // return $posts;
     //relate post
     $relatedpost = Post::orderBy('category_id','desc')->inRandomOrder()->take(4)->get();
     $firstrelatedpost = $relatedpost->splice(0,1);
     $middlerelatedpost = $relatedpost->splice(0,2);
     $lastrelatedpost = $relatedpost->splice(0,1);

      if($post){
         return view('frontend.single_post',compact('post','posts','category','tag','firstrelatedpost','middlerelatedpost','lastrelatedpost'));
      }
      else{
         return view('frontend.index');
      }
       
     // $tag = Tag::all();
    //  $PostList = Post::take(6)->get();
   
      // return view('frontend.single_post',compact(['post','posts']));
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

    //category
    public function category()
    {

      $categoryList = Category::all();
      return view('frontend.category',compact('categoryList'));
    }


}
