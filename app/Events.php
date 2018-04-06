<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function days()
    {
        return $this->hasOne('Days');
    }
}
