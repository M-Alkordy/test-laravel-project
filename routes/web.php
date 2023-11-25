<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* test */



$languageList = 'ar|en';
$optionalLanguageRoutes = function() {
    Route::get('/', [App\Http\Controllers\SectionController::class, 'index'])->name('home');
    Route::post('send-email',[App\Http\Controllers\HomeController::class,'sendEmail']);
    Route::get('service/{service}',[App\Http\Controllers\ServiceController::class,'show']);
    Route::get('business/{logo}',[App\Http\Controllers\LogoController::class,'show']);
    Route::get('team/{team}',[App\Http\Controllers\TeamController::class,'show']);
};

// Add routes with lang-prefix
if ($languageList) {
    Route::group(
        ['prefix' => '/{lang}/', 'where' => ['lang' => $languageList]],
        $optionalLanguageRoutes
    );
}
$optionalLanguageRoutes();
Route::get('/', [App\Http\Controllers\SectionController::class, 'index'])->name('home');
Route::post('send-email',[App\Http\Controllers\HomeController::class,'sendEmail']);
Route::get('service/{service}',[App\Http\Controllers\ServiceController::class,'show']);
Route::get('business/{logo}',[App\Http\Controllers\LogoController::class,'show']);
Route::get('team/{team}',[App\Http\Controllers\TeamController::class,'show']);
Route::get('view',[App\Http\Controllers\Dashboard\NewsletterController::class,'view']);
Route::get('process-queue',[App\Http\Controllers\Dashboard\NewsletterController::class,'processQueue']);
Route::prefix('dashboard')->middleware('auth')->namespace('App\Http\Controllers\Dashboard')->group(function(){
    //Dashboard Index
    Route::get('/',[App\Http\Controllers\Dashboard\DashboardController::class,'index']);
    //Settings
    Route::get('site-settings',[App\Http\Controllers\Dashboard\DashboardController::class,'siteSettings']);
    Route::post('settings/save',[App\Http\Controllers\Dashboard\DashboardController::class,'siteSettingsSave']);
    //Section
    Route::resource('sections',SectionController::class);
    Route::get('section-type',[App\Http\Controllers\Dashboard\SectionController::class,'sectionType']);
    //Memu
    Route::resource('menus',MenuController::class);
    Route::get('menu/menu-type',[App\Http\Controllers\Dashboard\MenuController::class,'menuType']);
    //Slider
    Route::resource('sliders',SliderController::class);
    Route::resource('sliders/{slider_id}/slides',SlideController::class);
    //Services
    Route::resource('services',ServiceController::class);
    //Team
    Route::resource('teams',TeamController::class);
    //Logo Group
    Route::resource('logo-groups',LogoGroupController::class);
    Route::resource('logo-groups/{group_id}/logos',LogoController::class);
    //Newsletter
    Route::resource('subscribers-list',NewsletterListController::class);
    Route::post('{lid}/subcribers-uplaod',[App\Http\Controllers\Dashboard\SubscriberController::class,'upload']);
    Route::resource('{lid}/subcribers',SubscriberController::class);
    Route::post('/newsletters/send',[App\Http\Controllers\Dashboard\NewsletterController::class,'send']);
    Route::resource('/newsletters',NewsletterController::class);

});
