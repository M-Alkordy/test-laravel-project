<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Str;
use Image;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderBy('ordering')->get();
        $output_sections = [];
        foreach($sections as $section)
        {
            $section['html']=view('site.components.'.$section->component_type,compact('section'))->render();
            $output_sections[]=$section;
        }
        return view('dashboard.sections.index',compact('output_sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $section = new Section();
        $type = $request->type;
        return view('dashboard.sections.form',compact('section','type'));
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
                $section = Section::find($request->id);
            }
            else
            {
                $section = new Section();
            }
            if($request->file('background_upload'))
            {
                $background_name = Str::random(40).'.'.$request->file('background_upload')->getClientOriginalExtension();
                $image = Image::make($request->file('background_upload'))->resize(1200,null,function($q){
                    $q->aspectRatio();
                })->opacity(15)->save(public_path('images/sections/backgrounds/'.$background_name),90);
                $section->background = $background_name;
            }
            $section->user_id=Auth::user()->id;
            $section->alias=($request->title && $request->title['en'])?Str::slug($request->title['en']):Str::random(10);
            $section->title=json_encode($request->title);
            $section->sub_title=json_encode($request->sub_title);
            $section->intro_text = json_encode($request->intro_text);
            $section->body = json_encode($request->body);
            $section->component_type=$request->component_type;
            $section->component_id=$request->component_id;
            $section->ordering=$request->ordering;
            if($request->published)
                $section->published=1;
            else
                $section->published=0;
            $section->save();
            return redirect('dashboard/sections');


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $section->title = json_decode($section->title,true);
        $section->sub_title =json_decode($section->sub_title,true);
        $section->intro_text =json_decode($section->intro_text,true);
        $section->body=json_decode($section->body,true);
        $type=$section->component_type;

        return view('dashboard.sections.form',compact('section','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return back();
    }

    public function sectionType()
    {
        return view('dashboard.sections.sectionType');
    }
}
