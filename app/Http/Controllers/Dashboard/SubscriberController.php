<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SubscriberImport;

class SubscriberController extends Controller
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
    public function create($lid)
    {
        $sub = new Subscriber();
        return view('dashboard/newsletter/sub/form',compact('lid','sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id)
        {
            $sub = Subscriber::find($request->id);
        }
        else
        {
            $sub = new Subscriber();
        }
        $testSub = Subscriber::where('email',$request->email)->first();
        if($testSub)
        {
            $testSub->name = $request->name;
            if($request->published)
        $testSub->published=1;
        else
        $testSub->published=0;
        if($request->subscribed)
        $testSub->subscribed=1;
        else
        $testSub->subscribed=0;
            $testSub->save();
            $lists = $testSub->lists()->pluck('list_id');

            $lists[]=$request->lid;

            $testSub->lists()->sync($lists);
        }
        else
        {
            $sub->name = $request->name;
        $sub->email = strtolower($request->email);
        if($request->published)
        $sub->published=1;
        else
        $sub->published=0;
        if($request->subscribed)
        $sub->subscribed=1;
        else
        $sub->subscribed=0;
        $sub->save();
        $sub->lists()->sync([$request->lid]);
        }
        
        
        return redirect('/dashboard/subscribers-list/'.$request->lid);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit($lid, $id)
    {
        $sub = Subscriber::find($id);
        return view('dashboard/newsletter/sub/form',compact('lid','sub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy($lid, $id)
    {
        Subscriber::find($id)->delete();
        return redirect('/dashboard/subscribers-list/'.$lid);
    }

    public function upload($lid,Request $request)
    {
        if($request->file->extension()!='xlsx' && $request->file->extension()!='xls' && $request->file->extension()!='csv')
        {
            return redirect()->back();
        }        
        Excel::import(new SubscriberImport($lid), $request->file);

        return redirect()->back();
    }
}
