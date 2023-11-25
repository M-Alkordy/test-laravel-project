<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class DashboardController extends Controller
{
    public  function index()
    {
        return view('dashboard.index');
    }

    public function siteSettings()
    {
        $settings = config('site_settings');
        return view('dashboard.siteSettings',compact('settings'));
    }
    public function siteSettingsSave(Request $request)
    {
        if(Auth::check())
        {
            if(Settings::first())
            $settings = Settings::first();
            else
                $settings=new Settings();
            $settings->name = json_encode($request->name);
            $settings->description = json_encode($request->description);
            $settings->keywords=$request->keywords;
            $settings->primary_color=$request->primary_color;
            $settings->secondary_color=$request->secondary_color;
            $settings->main_email=$request->main_email;
            $settings->contact=json_encode($request->contact);
            $settings->address=$request->address;
            if($request->file('img_upload'))
            {
                $img_name = Str::random(40).'.'.$request->file('img_upload')->getClientOriginalExtension();
                $image = Image::make($request->file('img_upload'))->resize(null,160,function($q){
                    $q->aspectRatio();
                })->save(public_path('images/site_logo/'.$img_name),90);
                $settings->img = $img_name;
            }
            if($request->online)
                $settings->online=1;
            else
                $settings->online=0;
            $settings->google_analytics_id=$request->google_analytics_id;
            $settings->save();
            return redirect('dashboard');
        }


    }
}
