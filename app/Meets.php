<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meets extends Model
{
    public function days() {
        return $this->hasMany('App\Days');
    }

    public function hosts() {
	return $this->hasOne('App\Hosts');
    }
    //
}
