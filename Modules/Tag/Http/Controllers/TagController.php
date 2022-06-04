<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tag\Entities\Tag;
use Illuminate\Support\Str;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tagList = Tag::SimplePaginate(8);
        return view('tag::index',compact('tagList'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $req)
    {

        $req->validate([
            'tag_name' => 'required|unique:tags,tag_name'
        ]);
        Tag::create([
            'tag_name' => $req->tag_name,
            'slug' => Str::slug($req->tag_name),
        ]);
        // return view('category::create');
        return back();
        // return view('tag::create');
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
        return view('tag::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Tag $tag)
    {


        return view('tag::edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Tag $tag)
    {
    //     $tag = $request->tagid;

    //    Tag::update([
    //        'tag_name' => $request->tag_name,
    //    ])->where('id',$tag)->get();
      // $tag = New Tag();
      $request->validate([
        'tag_name' => "required|unique:tags,tag_name,$tag->tag_name",
    ]);
       $tag->tag_name = $request->tag_name;
       $tag->slug = Str::slug($request->tag_name);
       $tag->save();

       return redirect()->route('taglist');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }
}
