<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
class ApiController extends Controller
{
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
