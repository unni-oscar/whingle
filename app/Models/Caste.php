<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caste extends Model
{
    
    public function religion()
    {
        return $this->belongsTo('App\Models\Religion');
    }
    public function profiles()
    {
        return $this->hasMany('App\Models\Profile');
    }
}
