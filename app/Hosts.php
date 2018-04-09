<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosts extends Model
{
     public function hosts ( ) {
	return $this->hasMany('App\Events');
     }    //
}
