<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
       
        $categoryList = Category::all();
        $postList = Post::all();
        return view('blog::index',compact('categoryList','postList'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
      // return $request->all();
     // $publish_date = date('Y-m-d');
      $request->validate([
        'title' => "required|unique:posts,title,$request->title",
        'post_desc' => "required",
        'category_list' => "required",
        'status' => "required",
        'publish_date' => "required",
      ]);
      $post = new Post();
      //   $post = Post::create([
      //       'title' => $request->title,
      //       'slug' => Str::slug($request->title),
      //       'image' => 'backend/blog/default.jpg',
      //       'description' => $request->post_desc,
      //       'category_id' => $request->category_list,
      //       'user_id' => '1',
      //       'status' => $request->status,
      //       'published_at' => $request->publish_date,

      //   ]);

        if($request->has('post_picture')) {
           
         $image = $request->file('post_picture');
         $filename = $image->getClientOriginalName();
         $image->move(public_path('backend/blog'), $filename);
         $post->image = $filename;
     }

     else{
      $post->title = $request->title;
      $post->slug = Str::slug($request->title);
      $post->image = 'backend/blog/default.jpg';
      $post->description = $request->post_desc;
      $post->category_id = $request->category_list;
      $post->user_id = '1';
      $post->status = $request->status;
      $post->published_at = $request->publish_date;
     }

     //zakir vhi code
   //      if($request->has('post_picture')) {
   //       $image = $request->post_picture;
   //       $filename = time() . '.' .$image->getClientOriginalName();
   //       $image->move('backend/blog', $filename);
   //       $post->image = 'backend/blog'.$filename;
   //     //  $post->image = $filename;
   //       $post->save();
   //   }

       $post->save();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //return $id;
       // $post = Post::find($id);
       //$post->delete();
        Post::destroy($id);
        return back();
    }
}
