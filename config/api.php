<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application User Groups
    |--------------------------------------------------------------------------
    |
    | This value is the user group of your application. This value is used when the
    | framework needs to store the user group into database or any other location
    | where it the user gruop is required by the application or its packages.
    |
    */

    'user_group' => [
        'user'      => 0,
        'manager'   => 1,
        'admin'     => 2
    ],
    'created_by' => [
        'Self'      => 0,
        'Parents'   => 1,
        'Siblings'  => 2,
        'Relatives' => 3,
        'Friends'   => 4,
        'Others'    => 5
    ],

];
