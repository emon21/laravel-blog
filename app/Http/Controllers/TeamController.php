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
         //Team Validation
      $this->validate($request,[
         'team_name' => 'required|string|unique:teams,team_name',
         'designation' => 'required|string',
         'team_description' => "required",
         'team_picture' => 'sometimes|nullable|image|max:2048',
      ]);
      //Team insert
      $team = Team::create([
         'team_name' => $request->team_name,
         'designation' => $request->designation,
         'team_desc' => $request->team_description,
         'team_img' =>  'backend/blog/default.png',
         'team_facebook_link' => $request->team_facebook,
         'team_twitter_link' => $request->team_twitter,
         'team_linkdin_link' => $request->team_linkdin,

      ]);

      if($request->has('team_picture')) {

      //    $imageName = time().'.'.$request->post_picture->extension();  
      //    $request->post_picture->move(public_path('backend/blog/'), $imageName);
      //   return $post->imageName;

         $filename = time() . '.' .$request->team_picture->getClientOriginalextension();
         //$request->post_picture->move('backend/blog/', $filename);
         $request->team_picture->move(public_path('backend/team/'), $filename);
         $team->team_img = 'backend/team/'.$filename;
         // $team->save();
      }

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
     
    //  return $request->all();
      //Team Validation
      $this->validate($request,[
         'team_name' => 'sometimes|nullable|required|string',
         'designation' => 'sometimes|nullable|required|string',
         'team_description' => "required",
         'team_picture' => 'sometimes|nullable|image|max:2048',
      ]);

      //Team Update
      $team->team_name = $request->team_name; 
      $team->designation = $request->designation; 
      $team->team_desc = $request->team_description; 
      $team->team_facebook_link = $request->team_facebook; 
      $team->team_twitter_link = $request->team_twitter; 
      $team->team_linkdin_link = $request->team_linkdin; 

       //Team Picture Change
         if($request->has('team_picture')) {

         //    $imageName = time().'.'.$request->post_picture->extension();  
         //    $request->post_picture->move(public_path('backend/blog/'), $imageName);
         //   return $post->imageName;

            $filename = time() . '.' .$request->team_picture->getClientOriginalextension();
            //$request->post_picture->move('backend/blog/', $filename);
            $request->team_picture->move(public_path('backend/team/'), $filename);
            $team->team_img = 'backend/team/'.$filename;
            // $team->save();
         }

      $team->save();
      Session::flash('status','Team Information Changed Successfully');
      return redirect()->route('team.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
       
        //Team Delete
        if($team){
         $team->delete();
        }
        else{
         abort(404);
        }
        Session::flash('error','Team Delete Successfully');
        return redirect()->route('team.index');
    }
}
