<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\LogoGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogoGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logoGroups = LogoGroup::get();
        return view('dashboard.logoGroup.index',compact('logoGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logoGroup = new LogoGroup();
        return view('dashboard.logoGroup.form',compact('logoGroup'));
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
                $logoGroup=LogoGroup::find($request->id);
            }
            else
            {
                $logoGroup = new LogoGroup();
            }
            $logoGroup->user_id = Auth::user()->id;
            $logoGroup->name = $request->name;
            $logoGroup->row=$request->row;
            $logoGroup->col=$request->col;
            if($request->published)
                $logoGroup->published=1;
            else
                $logoGroup->published=0;
            $logoGroup->save();
            return redirect('dashboard/logo-groups/'.$logoGroup->id.'/edit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogoGroup  $logoGroup
     * @return \Illuminate\Http\Response
     */
    public function show(LogoGroup $logoGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogoGroup  $logoGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(LogoGroup $logoGroup)
    {
        return view('dashboard.logoGroup.form',compact('logoGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogoGroup  $logoGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogoGroup $logoGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogoGroup  $logoGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogoGroup $logoGroup)
    {
        //
    }
}
