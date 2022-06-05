<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tag\Entities\Tag;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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

       Toastr::success('Create Tag Successfully', 'Tag', ["positionClass" => "toast-top-right","progressBar" => true,]);
      // toastr.success('Have fun storming the castle!', 'Miracle Max Says');
     // Session::flash('success', 'Tag Create Successfully !!');
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
       Toastr::success('Update Tag Successfully', 'Tag', ["positionClass" => "toast-top-right","progressBar" => true,]);
       //Toastr()->info('message', 'title', ['options']);
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
      Toastr::error('Delete Tag Successfully', 'Tag', ["positionClass" => "toast-top-right","progressBar" => true,]);

      return redirect()->route('taglist');

    }

    public function deleteall(Request $request)
    {

       // return $tag;
      //  $ids = $request->get('ids');
       // $dbc = DB::delete('delete form tag where id in(',implode(",",$ids)')');
       // $dbc = DB::table('tag')->whereIn('id',explode(',',$ids))->delete();
    //    $org->products()->whereIn('id', $ids)->delete()
        // return redirect()->route('taglist');

        $ids = $request->ids;
       // DB::table('tag')->whereIn('id',explode(',',$ids))->delete();
       Tag::whereIn('id', $ids)->delete();
       // return response()->json(['success'=>"Products Deleted successfully."]);
        return redirect()->route('taglist');

    }
}
