<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swimmers extends Model
{
     public function lanes() {
        return $this->hasMany('App\Lanes');
    }

    public function teams() {
	return $this->hasOne('App\Teams');
    }
    //   //
}
