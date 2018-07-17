<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use App\Models\Country;
use App\Notifications\UserActivate;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Mail;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Webpatser\Uuid\Uuid;
use App\Models\Religion;
use App\Models\MotherTongue;

class AuthController extends Controller
{

    public function register() {
        $keyArr = array('created_by', 'gender', 'marital');
        $whData = wh_arrayToObject($keyArr);
        $countries = Country::select('id', 'name')->orderBy('name', 'asc')->get(); 
        // $religions = Religion::select('id', 'name')->orderBy('name', 'asc')->get(); 
        $motherTongues = MotherTongue::select('id', 'name')->orderBy('name', 'asc')->get();  
        return response()->json(compact('countries',  'whData', 'motherTongues'));
    }
    public function store(RegisterRequest $request) {
        try {
            $user = new User();
            $user->short_id = strtoupper(base_convert(microtime(false), 10, 36));
            $user->name = $request->name;
            $user->email = $request->email;
            $user->user_group_id = config('api.user_group.User');
            $user->activation_token = utf8_encode(Uuid::generate(4));
            $user->password = bcrypt($request->password);
            $user->save();

            $profile = new Profile();
            $profile->name = $request->name;
            $profile->user_id = $user->id;
            $profile->created_by = $request->created_by;
            $profile->dob = now();
            $profile->marital_status = $request->marital_status;
            $profile->gender = $request->gender;
            $profile->save();
            DB::commit();
            //$user->notify(new UserActivate());
            //$this->notify(new UserActivate($user));
            return response()->json([
                'success' => true,
                'message' => __('messages.registration-success'),
                'data' => $user
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => __('messages.registration-failed'),
            ], 400);
        }
    }

    public function login(Request $request) {
        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => 'error',
                'message' => __('messages.invalid-credentials'),
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'token' => $jwt_token,
        ]);
    }
    
    public function logout() {
        try {
            $token = JWTAuth::getToken();

            if ($token) {
                JWTAuth::invalidate($token);
                return response()->json([
                    'status' => 'success',
                    'message' => 'User logged out successfully'
                ], 200);
            } 
        } catch (JWTException $e) {
            return response()->json([
                    'status' => 'error',
                    'message' => 'Sorry, the user could not be logged out'
                ], 500);
        }
    }

    public function check()
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token is invalid'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User authenticated'
        ], 200);
    }

    public function getAuthUser(){
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['authenticated' => false],401);
        }
        // Getting the user details
        $user = JWTAuth::parseToken()->authenticate();
        $profile = $user->Profile;
        // Getting the actual values from the key
        $createdBy = array_flip(config('api.user_group'));
        $profile['created_by'] = wh_flip($profile, 'created_by');
        $profile['dob'] = wh_getAge($profile['dob']);      
        
        return response()->json(compact('user','profile'));
    }
    public function editProfile() {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['authenticated' => false],401);
        }
        // Getting the user details
        $user = JWTAuth::parseToken()->authenticate();
        $profile = $user->Profile;
        $keyArr = array('created_by', 'gender', 'marital', 'yesNo', 'diet', 'drink', 'smoke', 'father','mother',
            'horoscope', 'manglik', 'star', 'moon_sign', 'family_type', 'family_values', 'family_status',
            'bro_sis');
        $whData = wh_arrayToObject($keyArr);
        $countries = Country::select('id', 'name')->orderBy('name', 'asc')->get(); 
        $religions = Religion::select('id', 'name')->orderBy('name', 'asc')->get(); 
        $motherTongues = MotherTongue::select('id', 'name')->orderBy('name', 'asc')->get();      
        return response()->json(compact('user','profile', 'countries',  'whData', 'motherTongues', 'religions'));
    }

    public function updateProfile(request $request) {
        // TODO : move this to request 
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'bail|required|in:1,2',
            'created_by' => 'required|gt:0|lt:7'
           
        ],[
            'name.required' => 'Name required'
        ]);

        if($validation->fails())
            return response()->json([
                'status' => 'error',
                'message' => $validation->messages()->first()
            ], 422);
        
        $user = JWTAuth::parseToken()->authenticate();
        $user->profile->name = $request->name;
        $user->profile->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully'
        ], 200);
         
    }

    public function index() {
        $users = User::all();
     //    $data = array(
     //    	'name' => "Learning Laravel from Unni",
     //    	'from' => "Unnikrishnan E S"
    	// );
     //    Mail::send('emails.test', $data, function ($message) use($data) {
     //    	$message->from('info@whingle.com', $data['from'])
     //    		->to('unnikrishnanes@gmail.com')
     //    		->subject('Learning Laravel test email');
    	// });
        return response()->json($users);
    }
}
