<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SiteMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name,$company,$subject,$message)
    {
        $this->email=$email;
        $this->name=$name;
        $this->company=$company;
        $this->subject =$subject;
        $this->message=$message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->markdown('emails.siteMessage')
            ->with(['email'=>$this->email,'name'=>$this->name,'company'=>$this->company,'subject'=>$this->subject,'message'=>$this->message]);
    }
}
