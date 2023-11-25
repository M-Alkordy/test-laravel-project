<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use \Illuminate\Support\Str;
use Auth;
class SlideController extends Controller
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
    public function create($slider_id)
    {
        $slide = new Slide();
        return view('dashboard/slides/form',compact('slide','slider_id'));
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
                $slide = Slide::find($request->id);
            }
            else
            {
                $slide = new Slide();
            }
            if($request->file('image'))
            {

                $img_name = Str::random(40).'.'.$request->file('image')->getClientOriginalExtension();
                $image = Image::make($request->file('image'))->resize(1200,null,function($q){
                    $q->aspectRatio();
                })->save(public_path('images/slides/'.$img_name),90);
                $slide->img = $img_name;
            }
            $slide->user_id = Auth::user()->id;
            $slide->slider_id = $request->slider_id;
            $slide->name = Str::slug($request->title['en']);
            $slide->title=json_encode($request->title);
            $slide->description = json_encode($request->description);
            $slide->ordering=$request->ordering;
            $slide->link_type =$request->link_type;
            $slide->link_value = $request->link_value;
            $slide->link_text = $request->link_text;
            if($request->published)
            {
                $slide->published =1;
            }
            else
            {
                $slide->published = 0;
            }
            $slide->save();
            return redirect('dashboard/sliders/'.$request->slider_id.'/edit');

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($slide)
    {
        dd($slide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($slider_id,$slide)
    {

        $slide = Slide::find($slide);
        $slide->title = json_decode($slide->title,true);
        $slide->description = json_decode($slide->description,true);
        return view('dashboard/slides/form',compact('slide','slider_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($slider_id,Slide $slide)
    {
        $slide->delete();
        return back();
    }
}
