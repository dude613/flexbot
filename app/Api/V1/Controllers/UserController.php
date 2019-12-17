<?php

namespace App\Api\V1\Controllers;
use App\User;

use App\Models\Helper;
use App\Http\Controllers\Controller;
use Auth;
use Dingo\Api\Http\Request;
use File;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', []);
        $this->middleware('auth.role:1', ['only' => ['AdminUpdateUser']]);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::guard()->user());
    }
    public function users(){
        return User::all();
    }
    public function CustomerUsers(){
        return User::GetAllCustomer();
    }
    public function GetUserDetails(){
        $user_id = Auth::user()->id;
        //$user_credit = Task::GetUserRemainingCredit($user_id);
        // echo json_encode(User::GetUserDetailsbyId($user_id));
        // exit;
        $rstlt = User::GetUserDetailsbyId($user_id);
        if($rstlt != null)
            return response()->json($rstlt);
        return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 400);
    }
    public function GetUserDetailsbyId(Request $request){
        //$user_credit = Task::GetUserRemainingCredit($user_id);
        // echo json_encode(User::GetUserDetailsbyId($user_id));
        // exit;
        if(!isset($request->user_id))
         return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 400);
        $rstlt = User::GetUserDetailsbyId($request->user_id);
        if($rstlt != null)
            return response()->json($rstlt);
        return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 400);
    }
    public function UpdateUser(Request $request){
        $user_update_type = $request->header('Info-Type');
        $user_image_url = $request->user_image_url;
        if(isset($user_image_url) && !empty($user_image_url)){
           // Copy file from the temporary directory.
           $user_image_url =  Helper :: MoveTemporaryfile($request->user_image_url, "Profile");
           if($user_image_url == null)
               return response()->json(['message' => 'File not found please try again.'], 400);
        }
           // Set file  url of the task.
        $request["user_image_url"] = $user_image_url;
        $request["user_id"] = Auth::user()->id;
        $rstlt = User::UpdateUser($request->all());
        if($rstlt)
            return response()->json(['message' => 'User '.$user_update_type.' Information Updated Successfully.'], 200);
        return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 400);
    }

    public function AdminUpdateUser(Request $request){
        if(!isset($request->user_id) && $request->user_id == ''){
            return response()->json(['message' => 'Invalid request please try agian.'], 400);
        }
        $user_update_type = $request->header('Info-Type');
        $user_image_url = $request->user_image_url;
        if(isset($user_image_url) && !empty($user_image_url)){
           // Copy file from the temporary directory.
           $user_image_url =  Helper :: MoveTemporaryfile($request->user_image_url, "Profile");
           if($user_image_url == null)
               return response()->json(['message' => 'File not found please try again.'], 400);
        }
           // Set file  url of the task.
        $request["user_image_url"] = $user_image_url;
        //$request["user_id"] = Auth::user()->id;
        $rstlt = User::UpdateUser($request->all());
        if($rstlt)
            return response()->json(['message' => 'User '.$user_update_type.' Information Updated Successfully.'], 200);
        return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 400);
    }
}
