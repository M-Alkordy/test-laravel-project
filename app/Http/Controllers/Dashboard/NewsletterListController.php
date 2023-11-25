<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\NewsletterList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsletterListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = NewsletterList::paginate(10);
        return view('dashboard/newsletter/list',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list= new NewsletterList();
        return view('dashboard/newsletter/createList',compact('list'));
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
            $list = NewsletterList::find($request->id);
        }
        else
        {
            $list = new NewsletterList();
        }
        $list->name = $request->name;
        $list->description = $request->description;
        if($request->published)
        $list->published=1;
        else
        $list->published=0;
        $list->save();
        return redirect('/dashboard/subscribers-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterList  $newsletterList
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $list = NewsletterList::find($id);
        
        return view('dashboard/newsletter/listview',compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterList  $newsletterList
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $list = NewsletterList::find($id);
        
        return view('dashboard/newsletter/createList',compact('list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterList  $newsletterList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterList $newsletterList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterList  $newsletterList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = NewsletterList::find($id)->delete();
        return redirect('/dashboard/subscribers-list');
        
    }
}
