<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\Profile;
use Tymon\JWTAuth\Exceptions\JWTException;

use Carbon\Carbon;

// use App\Http\Requests\SearchRequest;

class ProfileController extends Controller
{
    public function search() {
        $keyArr = array();
        $data['age'] = wh_getAgeList();
        $keyArr = array( 'height', 'created_by', 'marital');
        $whData = wh_arrayFlip($keyArr);
        return response()->json(compact('data', 'whData'));
    }

    public function show($id) {
        $keyArr = array('created_by', 'gender', 'marital', 'yesNo', 'diet', 'drink', 'smoke', 'father','mother',
            'horoscope', 'manglik', 'star', 'moon_sign', 'family_type', 'family_values', 'family_status',
            'bro_sis', 'job_category', 'education_category', 'income', 'height', 'weight', 'build', 'complexion', 'blood_group', 'disability');
        $whData = wh_arrayToObject($keyArr);        
        $query = Profile::query();
        $profile = $query->with('country', 'state', 'city')
            ->select()
            ->where('id', $id)
            ->first();

       return response()->json(compact('profile', 'whData'));
    }

    public function searchProfiles(Request $request) {
        $where = [
            [ 'dob', '>=' , $request->dob_to ],
            [ 'dob', '<' , $request->dob_from ],
            [ 'gender', '=', $request->gender ]
        ];
        $query = Profile::query();
        $profiles = $query
            ->with('user:id,updated_At')
            ->select('id', 'name','created_by', 'dob', 'user_id', 'height', 'marital_status')
            ->where($where)
            ->get();
        return response()->json(compact('profiles'));
    }
}
