<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lanes extends Model
{
    public function swimmers() {
	return $this->hasMany('App\Swimmers');
    }

    public function meets() {
	return $this->hasOne('App\Meets');
    }
    //
}
