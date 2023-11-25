<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogoGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function logos()
    {
        return $this->hasMany('App\Models\Logo');
    }
}
