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
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
       
        $categoryList = Category::all();
        $postList = Post::latest()->get();
        return view('blog::index',compact('categoryList','postList'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {

   
      $user = Auth::user()->id;
      // $request->validate([
      //   'title' => "required|unique:posts,title",
      //   'post_desc' => "required",
      //   'category_list' => "required",
      //   'status' => "required",
      //   'publish_date' => "required",
      // ]);
       $post = Post::create([
         'title' => $request->title,
         'slug' => Str::slug($request->title),
         'description' => $request->title,
         'image' => 'backend/blog/default.jpg',
         'category_id' => $request->category_list,
         'user_id' => $user,
         'status' => $request->status,
      ]);

    
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

         //zakir vhi code
         //      if($request->has('post_picture')) {
         //       $image = $request->post_picture;
         //       $filename = time() . '.' .$image->getClientOriginalName();
         //       $image->move('backend/blog', $filename);
         //       $post->image = 'backend/blog'.$filename;
         //       $post->image = $filename;
         //       $post->save();
         //   }

        return redirect('admin/post')->with('status','Post Inserted Successfully');

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
    public function edit(Post $post)
    {
     
       // $post = Post::find($id);
         $categoryList = Category::all();
         return view('blog::edit',compact('categoryList','post'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,Post $post)
    {
       
      
      $user_id = Auth::user()->id;

      $post->title = $request->title;
      $post->slug = Str::slug($request->title);
      $post->description = $request->post_desc;
      $post->category_id = $request->category_list;
      $post->user_id = $user_id;
      $post->status = $request->status;
      
      if($request->has('post_picture')) {
         
         $image = $request->file('post_picture');
         $filename = $image->getClientOriginalName();
         // $location = $image->move(public_path('backend/blog'), $filename);
         $location = $image->move('backend/blog/', $filename);
         $post->image = $location;
      }

      $post->save();
      // return redirect()->route('postList');
      return redirect('admin/post')->with('status','Post Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Post $post)
    {
       
    
// return $post->image;
      //  $image_path = "backend/blog/";  // Value is not URL but directory file path
      // if(File::exists($image_path)) {
      //    File::delete($image_path);
      // }
   //    $imageExists = file_exists($post->image);
   //    if ($imageExists) {
   //       if ($imageExists != 'backend/blog/default.png') {
   //           @unlink($post->image);
   //       }
   //   }

   //    if(file_exists($post->image)){
   //       @unlink($post->image);
   //   }

   
  // return $post->image;

  //  $filename = public_path().'/backend/blog/'.$file;
   // File::delete($filename);
  //  @unlink($post->image);

//   $filename = time() . '.' .$post->image->getClientOriginalextension();
//     ='backend/blog/'.$filename;
   //  return $post->image;
   //  return $filename = public_path().'/backend/blog/'.$post->image;
 

    $path = '/backend/blog/'.$post->image;

    if(file_exists($path)){
            @unlink($path);
        }

      // if($post->image != 'default.jpg'){
      //    $location = '/backend/blog/'.$post->image;
      //    @unlink($location);

      // // File::delete($post->image);
      // }
     $post->delete();
     return back()->with("success", "Image deleted successfully.");
     
   //      $post->delete();
   //      return back();

      //   $image = Image::find($request->id);

       // unlink("uploads/".$post->image);

       // Image::where("id", $image->id)->delete();


    }

    public function view(Post $post)
    {
      // return $postView = Post::first($post);
      $categoryList = Category::all();
        return view('blog::view',compact('post','categoryList'));
    }
}
