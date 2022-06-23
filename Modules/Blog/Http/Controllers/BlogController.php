<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    
    public function index()
    {
         $tags = Tag::all();
         $categoryList = Category::all();
         $postList = Post::latest()->get();
         return view('blog::index',compact('tags','categoryList','postList'));
    }

    public function create(Request $request)
    {
      $tags = Tag::all();
      $categoryList = Category::all();
      return view('blog::create',compact('tags','categoryList'));
  

    }

    public function store(Request $request)
    {
      
         // $this->validate($request,[
         //    'title' => 'required',
         // ]);

         //validation
         $request->validate([
            'title' => 'required',
            'post_desc' => 'required',
         ]);
    


      $user = Auth::user()->id;
      $post = Post::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->title,
        //'image' => 'backend/blog/default.jpg',
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

   
    public function show($id)
    {
        return view('blog::show');
    }

    public function edit(Post $post)
    {
     
         $tags = Tag::all();
         $categoryList = Category::all();
         return view('blog::edit',compact('tags','categoryList','post'));
    }

    public function update(Request $request,Post $post)
    {

      $post->title = $request->title;
      $post->slug = Str::slug($request->title);
      $post->description = $request->post_desc;
      $post->category_id = $request->category_list;
      $post->status = $request->status;
      
      $post->tags()->sync($request->tags);

      if($request->hasFile('post_picture')) {

       
         if(file_exists($post->image)){
            unlink($post->image);
          }
         
         $filename = time() . '.' .$request->post_picture->getClientOriginalextension();
         $request->post_picture->move(public_path('backend/blog/'), $filename);
         $post->image = 'backend/blog/'.$filename;
        // $post->save();


         // $image = $request->file('post_picture');
         // $filename = $image->getClientOriginalName();
         // // $location = $image->move(public_path('backend/blog'), $filename);
         // $location = $image->move('backend/blog/', $filename);
         // $post->image = $location;
      }

      $post->save();
      // return redirect()->route('postList');
      return redirect('admin/post')->with('status','Post Update Successfully');

    }

    
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

  
   

//   $filename = time() . '.' .$post->image->getClientOriginalextension();
//     ='backend/blog/'.$filename;
   //  return $post->image;
   //  return $filename = public_path().'/backend/blog/'.$post->image;
 

   //  $path = '/backend/blog/'.$post->image;

   //  if(file_exists($path)){
   //          @unlink($path);
   //      }

   

      // return $post;
      if ($post->image) {
         unlink($post->image);
         }
         else{
            $post->delete();
            //return back()->with("success", "Image deleted successfully.");
         } 
       return redirect('postList')->with('error','Post Deleted Successfully');
         
         
   //    $post->delete();
   //   return back()->with("success", "Image deleted successfully.");

    }

    public function view(Post $post)
    {
      $tags = Tag::all();
      $categoryList = Category::all();
        return view('blog::view',compact('tags','post','categoryList'));
    }
}
