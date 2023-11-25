<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\menu;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('ordering')->get();
        return view('dashboard.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->type;
        $menu = new Menu();
        $parents = Menu::where('parent_id',0)->orWhereNull('parent_id')->get();
        return view('dashboard.menus.form',compact('menu','type','parents'));

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
                $menu = Menu::find($request->id);
            }
            else
            {
                $menu = new Menu();
            }
            $menu->user_id = Auth::user()->id;
            $menu->name = json_encode($request->name);
            $menu->alias = Str::slug($request->name['en']);
            $menu->type=$request->menu_type;
            if($request->menu_type=='Section')
            {
                $section=Section::find($request->component_id);
                $menu->link='#'.$section->alias;
            }
            if($request->is_home)
            {
                Menu::update(['is_home',0]);
                $menu->is_home = 1;
            }
            else
                $menu->is_home=0;
            if($request->published)
                $menu->published =1;
            else
                $menu->published=0;
            $menu->parent_id =$request->parent_id;
            $menu->component_id = $request->component_id;
            $menu->ordering =$request->ordering;
            $menu->save();
            return redirect('dashboard/menus');


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        $menu->delete();
        return back();
    }


    public function menuType()
    {
        return view('dashboard.menus.menuType');
    }
}
