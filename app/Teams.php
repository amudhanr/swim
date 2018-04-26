<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
        public function swimmers() {
        return $this->hasMany('App\Swimmers');
    }

    //
}
