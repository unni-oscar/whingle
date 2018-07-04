<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    
    public function castes()
    {
        return $this->hasMany('App\Models\Caste');
    }
    public function profiles()
    {
        return $this->hasMany('App\Models\Profile');
    }
}
