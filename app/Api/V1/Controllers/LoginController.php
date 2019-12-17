<?php

namespace App\Api\V1\Controllers;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;
use App\Models\SendEmail;
use Illuminate\Http\Request;
use App\Api\V1\Requests\SendMailRequest;
use App\User;
use Mail;
use App\Models\Helper;

class LoginController extends Controller
{
    /**
     * Log the user in
     *
     * @param LoginRequest $request
     * @param JWTAuth $JWTAuth
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request, JWTAuth $JWTAuth)
    {
        $isemailVerified = User :: isemailVerified($request->email);
        if(!$isemailVerified){
            return response()->json(['message' => 'Email address is not verified.', 'isemail_verified' => 'false'], 400) ;
        }
        $credentials = $request->only(['email', 'password']);
//        echo json_encode($credentials);
//        exit();
        try {
            $token = Auth::guard()->attempt($credentials);

            if(!$token) {
                throw new AccessDeniedHttpException();
            }

        } catch (JWTException $e) {
            throw new HttpException(500);
        }
        $user = Auth::guard()->user()->only(['id','name','email']);
        $role = Auth::guard()->user()->only(['role'])['role']->id;
        $user_details = User:: GetUserDetailsbyId($user['id']);

        //return json_encode($tt);
        return response()
            ->json([
                'status' => 'ok',
                'token' => $role.''.$token,
                'user'=> $user,
                'user_details'=> $user_details,
                'expires_in' => Auth::guard()->factory()->getTTL() * 48 * 60 * 60
            ]);
    }

    public function ResendVerificationEmail(Request $request)
    {
        if(!isset($request->email)){
            return response()->json(['message' => 'Something went wrong please try agian.'], 400) ;
        }
        $isemailexist = User :: isEmailExist($request->email);
        if(!$isemailexist){
            return response()->json(['message' => 'Please provide valid email address and try again.'], 400) ;
        }
        $isemailVerified = User :: isemailVerified($request->email);
        if($isemailVerified){
            return response()->json(['message' => 'Email address is verified please login.', 'isemail_verified' => 'true'], 400) ;
        }
        else{
            $verify_code = Helper ::getRandomString();
            $result = User :: NewVerificationCode($request->email,$request->verify_code);
            if($result){
                SendEmail::basic_email($request->email, 'Confirmation Email', 'Your Confirmation Code is '.$verify_code);
                return response()->json(['message' => 'A verification token has been sent to your email.'], 200);
            }
            if($result){
                return response()->json(['message' => 'Invalid token please try again.'], 400);
            }
        }
    }
}
