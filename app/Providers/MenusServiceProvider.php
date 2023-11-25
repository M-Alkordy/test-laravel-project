<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
class MenusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('menus'))
        {
            $menus = \App\Models\Menu::where('published',1)->where('parent_id',0)->orderBy('ordering')->get();
            $settings =\App\Models\Settings::first();
            if($settings && $menus)
            {
                $settings->visit_count=$settings->visit_count+1;
                $settings->save();
                $settings->name = json_decode($settings->name,true);
                $settings->description=json_decode($settings->description,true);
                $settings->contact=json_decode($settings->contact,true);
            }
    
            config()->set('main_menu',$menus);
            config()->set('site_settings',$settings);
        }
       
    }
}
