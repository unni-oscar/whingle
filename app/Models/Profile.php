<?php

namespace App\Models;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing. Set auto-increment to false.
     *
     * @var bool
     */
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
