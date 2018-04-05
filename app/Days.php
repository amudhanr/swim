<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    public function meets() {
        return $this->hasOne('App\Meets');
    }

    public function events() {
        return $this->hasMany('App\Events');
    }
}
