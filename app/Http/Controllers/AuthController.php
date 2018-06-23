<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

use Mail;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function register(RegisterAuthRequest $request) {
        //new User()
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_group_id = config('api.user_group.user') ;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'data' => $user
        ], 201);
    }

    public function login(Request $request) {
        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => __('messages.invalid-credentials'),
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function getAuthUser(Request $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
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
