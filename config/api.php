<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application User Groups
    |--------------------------------------------------------------------------
    |
    | This value is the user group of your application. This value is used when the
    | framework needs to store the user group into database or any other location
    | where it the user group is required by the application or its packages.
    |
    */

    'user_group' => [
        'User'      => 0,
        'Manager'   => 1,
        'Admin'     => 2
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Profile Gender
    |--------------------------------------------------------------------------
    |
    | This value is the profile gender of your application. This value is used when the
    | framework needs to store the profile gender into database or any other location
    | where it the profile gender is required by the application or its packages.
    |
    */
    
    'gender' => [
        'Male'      => 1,
        'Female'    => 2
    ],
    'yesNo' => [
        'Yes'      => 1,
        'No'    => 0
    ],
    'marital' => [
        'Single'    => 1,
        'Married'   => 2,
        'Separated' => 3
    ],
    'created_by' => [
        'Self'      => 1,
        'Parents'   => 2,
        'Siblings'  => 3,
        'Relatives' => 4,
        'Friends'   => 5,
        'Others'    => 6
    ],
    'diet' => [
        'Veg'    => 1,
        'Non-veg'   => 2,
        'Eggitarian' => 3
    ],
    'drink' => [
        'Yes'    => 1,
        'No'   => 2,
        'Occationally' => 3
    ],
    'smoke' => [
        'Yes'    => 1,
        'No'   => 2,
        'Occationally' => 3
    ],
    'horoscope' => [
        'Yes'    => 1,
        'No'   => 2,
        'Doesn\'t matter' => 3
    ],
    'manglik' => [
        'Yes'    => 1,
        'No'   => 2,
        'Don\'t know' => 3
    ],
    'star' => [
        'Aswathy'    => 1,
        'Bharani'   => 2,
        'Karthika' => 3
    ],
    'moon_sign' => [
        'Carpicon'    => 1,
        'Libra'   => 2,
        'Sagitarius' => 3
    ],
    'family_type' => [
        'Joint'    => 1,
        'Nuclear'   => 2,
    ],
    'family_status' => [
        'lower class'    => 1,
        'middle class'   => 2,
        'upper class' => 3
    ],
    'family_values' => [
        'liberal'    => 1,
        'Orthodox'   => 2,
    ],
    'father' => [
        'Retired'    => 1,
        'Govt. service'   => 2,
        'Pvt. service'   => 3,
    ],
    'mother' => [
        'House Wife'    => 1,
        'Govt. service'   => 2,
        'Pvt. service'   => 3,
    ],
    'disability' => [
        'No'    => 0,
        'Yes'   => 1
    ],
    'blood_group' => [
        'A+'   => 1,
        'A-'   => 2,
        'B+'   => 3,
        'B-'   => 4
    ],
    'bro_sis' => [
        0 => 0,
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10
    ],

];
