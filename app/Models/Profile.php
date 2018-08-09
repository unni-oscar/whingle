<?php

namespace App\Models;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['name', 'created_by', 'gender', 'has_children', 'dob'];
    protected $guarded = ['id', 'user_id'];


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
        return $this->belongsTo('App\Models\Country', 'country_living', 'id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_living', 'id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_living', 'id');
    }

    public function mother_tongue()
    {
        return $this->belongsTo('App\Models\MotherTongue');
    }

    public function education()
    {
        return $this->belongsTo('App\Models\Education');
    }
    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }
}
