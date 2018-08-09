<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\Profile;
use Tymon\JWTAuth\Exceptions\JWTException;


// use App\Http\Requests\SearchRequest;


class UserController extends Controller
{
    public function search() {
        $keyArr = array();
        $whData['age'] = wh_getAgeList();
        return response()->json(compact('whData'));
    }

    public function searchProfiles(Request $request) {
        // try {
        //    JWTAuth::parseToken()->authenticate();
        // } catch(Exception $e) {
        //     print_r($e->getMessage());
        // }
     
        $profiles = Profile::where('gender', $request->gender)->get();
        return response()->json(compact('profiles'));

        die;
    }
}
