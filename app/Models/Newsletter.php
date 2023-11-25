<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    public function sentEmails()
    {
        return $this->hasMany('App\Models\MailQueue')->whereNotNull('sent_at');
    }
    public function penddingEmails()
    {
        return $this->hasMany('App\Models\MailQueue')->whereNull('sent_at');
    }
    public function views()
    {
        return $this->hasMany('App\Models\NewsletterView');
    }
}
