<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heats extends Model
{
    public function heats() {
	return $this->belongsTo('Events');
    }//
}
