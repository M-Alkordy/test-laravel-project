<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Models\MailQueue;
class Semail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sub_id=null,$newsletter_id=null)
    {   
        if($sub_id && $newsletter_id)
        {
            
            $this->sub = Subscriber::find($sub_id);

            $this->newsletter = Newsletter::find($newsletter_id);

        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
return $this->from($this->newsletter->from_email?$this->newsletter->from_email:'hello@fshcpa.org',$this->newsletter->from_name)->replyTo($this->newsletter->reply_email?$this->newsletter->reply_email:'info@fshcpa.com',$this->newsletter->reply_name)->subject($this->newsletter->subject)->markdown('emails.sEmail')->with(['newsletter'=>$this->newsletter,'sub_id'=>$this->sub->id]);
        
    }
}