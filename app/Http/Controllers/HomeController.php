<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SiteMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slides=[];

        return view('home');
    }
    public function sendEmail(Request $request)
    {

        if ($request->name && $request->email) {
            Mail::to(config('site_settings.main_email'))->send(new SiteMessage($request->email,$request->name,$request->company,$request->subject,$request->message));
            return back()->with('message','Thank You. Your Message has been Submitted');
        }

    }
}
