<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teammate extends Model
{
    public function activities()
    {
        return $this->belongsToMany('App\Activity')->withTimestamps();
    }
}
