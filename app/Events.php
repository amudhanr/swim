<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function days()
    {
        return $this->belongsTo('App\Days');
    }

    public function heats()
    {   
	return $this->hasMany('App\Heats');
    }
}
