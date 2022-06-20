<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $teams = Team::all();
        return view('backend.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.team.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //User Validation
      $this->validate($request,[
         'name' => 'required|string|max:255',
         'email' => "required|email|unique:users,email",
         'password' => 'required|min:8',
         'image' => 'sometimes|nullable|image|max:2048',
      ]);
      //user insert
      $team = Team::create([
         'team_name' => $request->name,
         'team_img' => $request->email,
         'team_desc' => bcrypt($request->password),
         'team_facebook_link' => $request->desc,
         'team_twitter_link' => Str::slug($request->name),
         'team_linkdin_link' => 0,

      ]);

      $team->save();

      Session::flash('status','Team Created Successfully');
      return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
      return view('backend.team.show',compact('team'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
      return view('backend.team.edit',compact('team'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
     // return view('backend.team.edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return 'Team Delete';
    }
}
