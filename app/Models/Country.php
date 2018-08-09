<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     /**
     * The attributes that are visible.
     *
     * @var array
     */

    protected $visible = ['id', 'name'];

    public function profiles()
    {
        return $this->hasMany('App\Models\Profile');
    }

    public function states()
    {
        return $this->hasMany('App\Models\State');
    }
}
