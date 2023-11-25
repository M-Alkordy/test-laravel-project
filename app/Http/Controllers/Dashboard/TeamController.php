<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::get();
        return view('dashboard.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = new Team();
        return view('dashboard.teams.form',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
            if($request->id)
            {
                $team = Team::find($request->id);
            }
            else
            {
                $team = new Team();
            }
            $team->user_id = Auth::user()->id;
            $team->name = json_encode($request->name);
            $team->job_title= json_encode($request->job_title);
            $team->intro_text = json_encode($request->intro_text);
            $team->full_text = json_encode($request->full_text);
            $team->ordering = $request->ordering;
            if($request->published)
                $team->published=1;
            else
                $team->published =0;
            if($request->home_page)
                $team->home_page=1;
            else
                $team->home_page =0;
            if($request->file('img_upload'))
            {
                $img_name = Str::random(40).'.'.$request->file('img_upload')->getClientOriginalExtension();
                $image = Image::make($request->file('img_upload'))->resize(450,null,function($q){
                    $q->aspectRatio();
                })->save(public_path('images/teams/'.$img_name),90);
                $team->img = $img_name;
            }
            $team->save();

            return redirect('dashboard/teams');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $team->name = json_decode($team->name,true);
        $team->job_title = json_decode($team->job_title,true);
        $team->intro_text = json_decode($team->intro_text,true);
        $team->full_text = json_decode($team->full_text,true);
        return view('dashboard.teams.form',compact('team'));
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
        //
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
        return back();
    }
}
