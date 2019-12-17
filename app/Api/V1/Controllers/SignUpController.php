<?php

namespace App\Api\V1\Controllers;

use Config;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Helper;
use App\Models\SendEmail;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.role:1', ['only' => ['test']]);
    }
    // User Sign Up Controller
    public function signUp(SignUpRequest $request, JWTAuth $JWTAuth)
    {
        $isemailexist = User :: isEmailExist($request->email);
        $verify_code = Helper ::getRandomString();

        if($isemailexist){

            $isemailVerified = User :: isemailVerified($request->email);
//            echo $isemailVerified;
//            exit();
            if($isemailVerified){

                return response()->json(['message' => 'A verification token has been sent to your email.','isemail_verified' => 'true'], 400) ;
            }
            else{
                return response()->json(['message' => 'Email address is not verified.', 'isemail_verified' => 'false'], 400) ;
            }
            //return response()->json(['message' => 'A verification token has been sent to your email.'], 200);
            //$rslt = SendEmail::basic_email($request->email, 'Confirmation Email', 'Your Confirmation Code is '.$verify_code);
        }
        $request["role_id"] = 3;
        $request["name"] = $request->first_name .' '. $request->last_name;
        $request["verify_code"] = $verify_code;
        $user = new User($request->all());
        if(!$user->save()) {
            throw new HttpException(500);
        }

        $saveUserDetails = User :: SaveUserDetails($user->id, $request['first_name'],  $request['last_name']);
        if($saveUserDetails){
            SendEmail::basic_email($request->email, 'Confirmation Email', 'Your Confirmation Code is '.$verify_code);
            return response()->json(['message' => 'A verification token has been sent to your email.'], 200);
        }else{
            return response()->json(['message' => 'Something went wrong please try again.'], 400);
        }



    }
    public function test(){
        return response()->json(['message' => 'Jwt Role worked'], 200);
    }
    public function VerifyEmail(Request $request, JWTAuth $JWTAuth)
    {
        $saveUserDetails = User :: ConfirmedEmail($request->email, $request->token);
        if($saveUserDetails)
        {
            SendEmail::basic_email($request->email, 'email Confirmed', 'Thank you your email has been confirmed.');
            return response()->json(['message' => 'You email verified successfully.'], 200);
        }
        else{
            return response()->json(['message' => 'Something went wrong please try again.'], 400);
        }
    }
}
