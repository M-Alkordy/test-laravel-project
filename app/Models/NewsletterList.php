<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterList extends Model
{
    use HasFactory;
    public function subscribers()
    {
        return $this->belongsToMany('App\Models\Subscriber','list_sub','list_id','sub_id');
    }

}
