<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function profiles()
    {
        return $this->hasMany('App\Models\Profile');
    }
}
