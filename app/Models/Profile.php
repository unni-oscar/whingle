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
}
