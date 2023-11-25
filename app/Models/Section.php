<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $appends=['services','team'];
    use HasFactory;
    public function component()
    {
        return $this->belongsTo('App\Models\\'.$this->component_type)->where('published',1);
    }
    public function getServicesAttribute()
    {
        //if($this->component_type=='Service')
        return Service::where('published',1)->orderBy('ordering')->get();
        return null;
    }
    public function getTeamsAttribute()
    {
        if($this->component_type=='Team')
            return Team::where('published',1)->orderBy('ordering')->get();
        return null;
    }
}
