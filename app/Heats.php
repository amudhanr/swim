<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heats extends Model
{
    public function heats() {
	return $this->belongsTo('Events');
    }//
    public function lanes()
    {   
	return $this->hasMany('App\Lanes');
    }
}
