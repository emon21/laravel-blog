<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Tag\Entities\Tag;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Team;
use App\Models\User;


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

    //about
    public function about()
    {
      $user = User::first();
      $teams = Team::all();
      return view('frontend.about',compact('user','teams'));
    }
    //Contact
    public function contact()
    {
     // $user = User::first();
      return view('frontend.contact');
    }

    public function sendMessage(Request $request)
    {
     // return $request->all();
     //validation
     $this->validate($request,[
      'name' => 'required',
      'email' => 'required|email|max:200',
      'subject' => 'required|max:255',
      'message' => 'required|min:100',
     ]);
      $contact = New Contact();
      $contact->name = $request->name;
      $contact->email = $request->email;
      $contact->subject = $request->subject;
      $contact->message = $request->message;
      $contact->save();
      return redirect('contact')->with('status','Message Has Been Send');
     // return gettype($contact);
    }

    //Single Post
    public function SingleCategory($slug)
    {
      
     // $category = Category::withCount('posts')->where('slug',$slug)->first();
     
      $category = Category::withCount('posts')->where('slug',$slug)->first();
      if ($category) {
        //return $category;
        $postlist = Post::where('category_id',$category->id)->paginate(10);
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

      //$contents =Share::page(null, 'Share title')->facebook();
      
    
      $post = Post::withCount('category','user', 'comments')->Where('slug',$slug)->first();
      //return $post;
      $posts = Post::with('category','user')->inRandomOrder()->limit(4)->get();
      
      $comment = Comment::withCount('user','post')->where('post_id',$post->id)->get();

     // return $post->slug;
   //  return $posts;
      //   $relatedPost = Post::where('category_id', $post->category_id)->take(4)->get();
      //   if (!count($relatedPost)) {
      // $relatedPost = Post::where('category_id', $post->category_id)->orderBy('category_id','DESC')->inRandomOrder()->take(4)->get();
      //

      // $shareComponent = \Share::CurrentPage(null,$post->description)
      // $shareComponent = \Share::page(null,$post->description)
      // ->facebook()
      // ->twitter();
      // https://www.facebook.com/sharer/sharer.php?u=blog

     // https://www.facebook.com/sharer/sharer.php?u=.'url()->current()'.'

     //'.phpcode.'
    

      $shareComponent = \Share::page('http://127.0.0.1:8080/singlePost/mr-barney-okeefe','testy')
      ->facebook()
      ->twitter()
      ->linkedin();

  // return $shareComponen->url()->current();

    // Share button 1
//     $shareButtons1 = \Share::page($post->slug,$post->title)
// ->facebook()
// ->twitter()
// ->linkedin();

    // Load index view
   // return view('frontend.single_post')->with('shareButtons1',$shareButtons1);

      
//      $socialShares = \Share::page('http://127.0.0.1:8000/singlePost/vida-mckenzie',$post->title,
//   )->facebook()
//   ->twitter();


      $relatedPost =Post::orderBy('category_id','desc')->inRandomOrder()->take(4)->get();
      $firstrelatedpost = $relatedPost->splice(0,1);
      $middlerelatedpost = $relatedPost->splice(0,2);
      $lastrelatedpost = $relatedPost->splice(0,1);

     //$category = Category::with('post')->get();
     $category = Category::all();
      $tags = Tag::all();

      if($post){
         return view('frontend.single_post',compact('post','posts','category','tags','firstrelatedpost','middlerelatedpost','lastrelatedpost','comment','shareComponent'));
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

      "select * from post wher date";

      $categoryList = Category::withCount('posts')->get();
      $posts = Post::where('created_at','!=',null)->get();
   //return $posts->count();
  // where('created_at','2022-06-23 09:59:33') return $categoryList;
      return view('frontend.category',compact('categoryList','posts'));
    }

    //tag
    public function taglist()
    {
      // 'website.taglist'
      $taglist = tag::withCount('posts')->get();
      return view('frontend.taglist',compact('taglist'));

    }
    public function tag($slug)
    {
      $tag = tag::where('slug',$slug)->first();
      //return $tag->posts;
      if ($tag) {
        //return $category;
        $posts = $tag->posts()->orderBy('created_at','desc')->paginate(9);
       // return $posts;
         return view('frontend.tag',compact('tag','posts'));
      }
      else{
         return redirect()->route('website');
      }
    }


}
