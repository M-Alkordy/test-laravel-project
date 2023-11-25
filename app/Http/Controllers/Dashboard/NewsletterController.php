<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Mail\Semail;
use App\Models\MailQueue;
use App\Models\NewsletterList;
use App\Models\NewsletterView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::paginate(10);
        return view('dashboard/newsletter/message/list',compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsletter = new Newsletter();
        return view('dashboard/newsletter/message/form',compact('newsletter'));
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
            $newsletter = Newsletter::find($request->id);
        }
        else
        {
            $newsletter = new Newsletter();
        }
        $newsletter->subject = $request->subject;
        $newsletter->from_email = $request->from_email;
        $newsletter->from_name = $request->from_name;
        $newsletter->reply_email = $request->reply_email;
        $newsletter->reply_name = $request->reply_name;
        $newsletter->message = $request->message;
        if($request->published)
        $newsletter->published = 1;
        else
        $newsletter->published=0;
        $newsletter->save();
        return redirect('dashboard/newsletters');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        $lists = NewsletterList::where('published',1)->get();
        return view('dashboard/newsletter/message/show',compact('newsletter','lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $newsletter = Newsletter::find($id);
        return view('dashboard/newsletter/message/form',compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id)->delete();
        return redirect()->back();
    }

    public function send(Request $request)
    {
        if($request->lists && $request->id)
        {
            $listsArray = NewsletterList::whereIn('id',$request->lists)->get();
            $subArray = [];
            foreach($listsArray as $list)
            {
                $subArray = array_merge($subArray,$list->subscribers()->where('published',1)->where('subscribed',1)->pluck('id')->toArray());
                $subArray = array_unique($subArray);
            }
            
            foreach($subArray as $suba)
            {
                if(!MailQueue::where('newsletter_id',$request->id)->where('sub_id',$suba)->whereNull('sent_at')->first())
                {
                    $queue = new MailQueue();
                    $queue->newsletter_id=$request->id;
                    $queue->sub_id=$suba;
                    $queue->save();
                    $sub=Subscriber::find($suba);
                    
                }
                
            }

        }
        return redirect('dashboard/newsletters');
    }

    public function view(Request $request)
    {
     $testView = NewsletterView::where('newsletter_id',$request->newsletter_id)->where('sub_id',$request->sub_id)->first();
     if($testView)
     {
        $testView->count = $testView->count+1;
        $testView->save();
     }   
     else
     {
        $testView = new NewsletterView();
        $testView->newsletter_id = $request->newsletter_id;
        $testView->sub_id = $request->sub_id;
        $testView->count = 1;
        $testView->save();
     }
    }

    public function processQueue()
    {
        $queues = MailQueue::whereNull('sent_at')->where('status','pending')->orderBy('id','ASC')->limit(20)->get();
        foreach($queues as $queue)
        {
            $queue->sent_at=date('Y-m-d h:i:s');
            $queue->status ="sent";
            $queue->save();
            $sub = Subscriber::find($queue->sub_id);
            $newsletter = Newsletter::find($queue->newsletter_id);
            $Url="https://emailverification.whoisxmlapi.com/api/v1?apiKey=at_5KTfYZ8WISEhfSRzuGVm799Ev903f&emailAddress=".trim($sub->email);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $Url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            if(str_contains($sub->email,'gmail.com') || str_contains($sub->email,'hotmail') || str_contains($sub->email,'yahoo') || str_contains($sub->email,'outlook') || str_contains($sub->email,'gmail.com') || str_contains($sub->email,'windowslive') || str_contains($sub->email,'aol.com') || str_contains($sub->email,'zoho') || str_contains($sub->email,'icloud.com'))
            {
                try
                {
                    $output = curl_exec($ch);
                    $output = json_decode($output,true);
                    if(isset($output['smtpCheck']) && $output['smtpCheck']=='true')
                    {
                        $mq = Mail::to($sub->email)->send(new Semail($sub->id,$newsletter->id));
                    }
                    else
                    {
                        $sub->subscribed=0;
                        $sub->save();
                    }    
                }
                catch(\Exception $e)
                {
                    throw $e->getMessage();
                }
            }
            else
            {
                $mq = Mail::to($sub->email)->send(new Semail($sub->id,$newsletter->id));
            }
        }
    }
}
