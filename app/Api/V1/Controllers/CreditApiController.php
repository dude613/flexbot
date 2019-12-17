<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit;
use App\Http\Resources\CreditResource;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\BuyCreditRequest;
use App\Models\Task;

use Illuminate\Support\Facades\Auth;

class CreditApiController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', []);
        $this->middleware('auth.role:1', ['only' => ['UpdateUserCreditbyAdmin', 'UserCreditHistorybyUserID']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CreditResource::collection(Credit::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //        $credit = Credit::create([
    //            'user_id' => $request->user_id,
    //            'credit_amount' => $request->credit_amount,
    //            'created_by' => $request->created_by,
    //        ]);
        Credit::create($request->all());
        return $request->all();
    }

    public function BuyCredit(BuyCreditRequest $request){
        $user_id = Auth::user()->id;
        $user_credit = Task::GetUserRemainingCredit($user_id);
        $request["credit_type"] = "in";
        $request['total_credit'] = $user_credit + $request->credit_amount;
        return Credit::AddCreditHistory();
    }
    public function UpdateUserCreditbyAdmin(Request $request){
        $created_by = Auth::user()->id;
        $user_credit = Task::GetUserRemainingCredit($request->user_id);
        $data["user_id"] =  $request->user_id;
        $data["credit_amount"] =  $request->credit_amount;
        $credit_type = "out";
        $total_credit = 0;
        if(isset($request->credit_in) && ($request->credit_in || $request->credit_in == 'true')){
            // echo $request->credit_in;
            // exit();
            $credit_type = "in"; 
            $total_credit  = $user_credit + $request->credit_amount;
        }
        else if(isset($request->credit_in) && !$request->credit_in || $request->credit_in == 'false'){
            // echo $request->credit_in;
            $credit_type = "out"; 
            $new_credit = $user_credit - $request->credit_amount;
            $total_credit = $new_credit<0 ? 0 : $new_credit;
        }
        $data["credit_type"] = $credit_type;
        $data["total_credit"] = $total_credit;
        $data["created_by"] = $created_by;
        $crd_hst_id = Credit :: AddCreditHistory($data);
        if($crd_hst_id>0){
            $rslt = Credit :: UpdateUserCredit($request->user_id, $data["total_credit"]);
            if($rslt){
                return response()->json(['message' => 'Credit successfully added to user account'], 200);
            }
            return response()->json(['message' => 'Something went wrong please try again'], 400);
        }
        
    }
    public function UserCreditHistory(){
        $user_id = Auth::user()->id;
        return Credit :: UserCreditHistory($user_id);
    }
    public function UserCreditHistorybyUserID(Request $request){
        if(!isset($request->user_id) && $request->user_id == ''){
            return response()->json(['message' => 'Invalid request please try again.'], 400);
        }
        $user_id = $request->user_id;
        return Credit :: UserCreditHistory($user_id);
    }
}
