<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {
        $logo = new Logo();
        $logo_group_id =$group_id;
        return view('dashboard.logos.form',compact('logo','logo_group_id'));
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
                $logo = Logo::find($request->id);
            }
            else
            {
                $logo = new Logo();
            }
            $logo->user_id = Auth::user()->id;
            $logo->logo_group_id=$request->logo_group_id;
            $logo->title=json_encode($request->title);
            $logo->full_text = json_encode($request->full_text);
            if($request->file('img_upload'))
            {
                $img_name = Str::random(40).'.'.$request->file('img_upload')->getClientOriginalExtension();
                $image = Image::make($request->file('img_upload'))->resize(450,null,function($q){
                    $q->aspectRatio();
                })->save(public_path('images/logos/'.$img_name),90);
                $logo->img = $img_name;
            }
            $logo->ordering= $request->ordering;
            if($request->published)
                $logo->published = 1;
            else
                $logo->published=0;
            $logo->save();
            return redirect('dashboard/logo-groups/'.$request->logo_group_id.'/edit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit($group_id,Logo $logo)
    {
        $logo->title = json_decode($logo->title,true);
        $logo->full_text=json_decode($logo->full_text,true);
        $logo_group_id=$logo->logo_group_id;
        return view('dashboard.logos.form',compact('logo','logo_group_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy($group_id,Logo $logo)
    {
        $logo->delete();
        return back();
    }
}
