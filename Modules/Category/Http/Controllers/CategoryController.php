<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $category = Category::Paginate();
    //    return view('blog::category.index',compact('category'));
        return view('category::index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $req)
    {

        $req->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        Category::create([
            'category_name' => $req->category_name,
            'slug' => Str::slug($req->category_name),
            'image' => 'backend/default.jpg'
        ]);
        // return view('category::create');
        return back();
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
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Category $category)
    {
        return view('category::edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,Category $category)
    {
      // return $request->category_name;
      // dd($request->all());
      $request->validate([
        'category_name' => "required|unique:categories,category_name,$category->category_name",
    ]);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->save();
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return back();
    }

    //Status
    public function status(Request $request,Category $category)
    {

        //return $category;
        $status = $category->status;
        if ($status == 1) {
            $status = 0;
        }
        else{
            $status = 1;
        }
        $category->status = $status;

        // Category::update([
        //     'status' => $req->category;
        // ])->where('id',$category)->get();

        $category->save();
        return redirect()->route('category');
    }
}
