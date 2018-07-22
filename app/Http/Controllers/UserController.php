<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
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
        //     JWTAuth::parseToken()->authenticate();
        // } catch(Exception $e) {
        //     print_r($e->getMessage());
        // }
        
        print_r($request->all());
        die;
    }
}
