<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    public function lists()
    {
        return $this->belongsToMany('App\Models\NewsletterList','list_sub','sub_id','list_id');
    }
}
