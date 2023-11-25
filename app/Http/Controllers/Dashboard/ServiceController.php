<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();
        return view('dashboard.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Service();
        return view('dashboard.services.form',compact('service'));
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
                $service = Service::find($request->id);
            }
            else
            {
                $service = new Service();
            }
            if($request->file('icon_upload'))
            {
                $icon_name = Str::random(40).'.'.$request->file('icon_upload')->getClientOriginalExtension();
                $image = Image::make($request->file('icon_upload'))->resize(260,null,function($q){
                    $q->aspectRatio();
                })->save(public_path('images/services/icons/'.$icon_name),90);
                $service->icon = $icon_name;
            }
            if($request->file('img_upload'))
            {
                $img_name = Str::random(40).'.'.$request->file('img_upload')->getClientOriginalExtension();
                $image = Image::make($request->file('img_upload'))->resize(450,null,function($q){
                    $q->aspectRatio();
                })->save(public_path('images/services/images/'.$img_name),90);
                $service->img = $img_name;
            }
            $service->user_id = Auth::user()->id;
            $service->title = json_encode($request->title);
            $service->sub_title = json_encode($request->sub_title);
            $service->intro_text = json_encode($request->intro_text);
            $service->full_text = json_encode($request->full_text);
            $service->ordering = $request->ordering;
            if($request->published)
            {
                $service->published=1;
            }
            else
            {
                $service->published=0;
            }
            $service->save();
            return redirect('dashboard/services');
        }
        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service->title = json_decode($service->title,true);
        $service->sub_title = json_decode($service->sub_title,true);
        $service->intro_text = json_decode($service->intro_text,true);
        $service->full_text = json_decode($service->full_text,true);
        return view('dashboard.services.form',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return  back();
    }
}
