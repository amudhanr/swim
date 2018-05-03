<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    public function meets() {
        return $this->belongsTo('App\Meets');
    }

    public function events() {
        return $this->hasMany('App\Events');
    }

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = strtolower(str_replace(' ', '-', preg_replace('/\s+/', ' ', $value)));
    }
}
