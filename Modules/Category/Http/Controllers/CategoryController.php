<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
   //Category Show
    public function index()
    {
        $category = Category::withCount('posts')->orderBy('id','desc')->Paginate(10);
       // return $category;
    //    return view('blog::category.index',compact('category'));
        return view('category::index',compact('category'));
    }

   //Category Create
    public function create(Request $request)
    {

      return view('category::create');
       
    }

      //Category Store
    public function store(Request $request)
    {
      //validation
      $request->validate([
         'category_name' => 'required|unique:categories,category_name'
     ]);

     //insert data
     $post = Category::create([
         'category_name' => $request->category_name,
         'slug' => Str::slug($request->category_name),
         // 'image' => 'backend/category/default.jpg'
     ]);

     //image upload
     if($request->has('post_picture')) {
         $filename = time() . '.' .$request->post_picture->getClientOriginalextension();
         $request->post_picture->move(public_path('backend/category/'), $filename);
         $post->image = 'backend/category/'.$filename;
         $post->save();
      }
      Session::flash('success','Category Created Successfully');
      return redirect()->route('category');
    }

    //Category View
    public function show($id)
    {
        return view('category::show');
    }

    //Category Edit
    public function edit(Category $category)
    {
        return view('category::edit',compact('category'));
    }

   //Category Update
    public function update(Request $request,Category $category)
    {
      //return $request->desc;
      // dd($request->all());
         $request->validate([
         'category_name' => "required"
      ]);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->description = $request->desc;
       // $category->image = 'backend/category/default.jpg';


      if($request->hasFile('post_picture')) {

         // if ($category->image) {
         //    unlink($category->image);
         // }

         //delete File
         if(file_exists($category->image)){
            unlink($category->image);
          }
         //  else{
         //  //  dd('File does not exists.');
           
         //   // $category->save();
         //  }
            //file upload
          $filename = time() . '.' .$request->post_picture->getClientOriginalextension();
          $request->post_picture->move(public_path('backend/category/'), $filename);
          $category->image = 'backend/category/'.$filename;

      }
      $category->save();
      Session::flash('success','Category Updated Successfully');
      return redirect()->route('category');
    }

    //Category Delete
    public function destroy(Category $category)
    {
        //
        //delete File
         if(file_exists($category->image)){
            unlink($category->image);
          }
        $category->delete();
        Session::flash('error','Category Delete Successfully');
        return redirect()->route('category');
    }

    //Category Status
    public function status(Request $request,Category $category)
    {

        //return $category;
        $status = $category->status;
        if ($status == 1) {
            $status = 0;
            Session::flash('error','Category Status Disable Successfully');
         }
         else{
            $status = 1;
            Session::flash('status','Category Status Enable Successfully');
        }
        $category->status = $status;

        // Category::update([
        //     'status' => $req->category;
        // ])->where('id',$category)->get();

        $category->save();
        return redirect()->route('category');
    }
}
