<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Stripe;

use App\Api\V1\Requests\PayRequest;

//Models
use App\Models\Product;
use App\Models\Helper;
use App\Models\Credit;
use App\Models\Task;

use Illuminate\Support\Facades\Auth;


class PaymentApiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('jwt.auth', []);
    }
    public function stripePost(Request $request)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from wesoft.tech" 
        ]);
        Session::flash('success', 'Payment successful!');
        return true;
    }
    public function PaymentforBuyCredit(Request $request)
    {
        $user_email = Auth::user()->email;
        $user_id = Auth::user()->id;
        //$p_req = new PayRequest(['tt' => 'foo']);
        $product_info = Product::GettProductById($request->product_id);
        if(count($product_info) > 0){
            // return json_encode($product_info[0]);
            // exit();
            if($product_info[0]->price == $request->price){
                $request['amount'] = $product_info[0]->price; // amount of the price
                $request['description'] = $user_email. ' Buy credit product :'. '#00'.$product_info[0]->product_id;
                $rslt =  Helper::PaymentHelper( $request->all());
                if($rslt){
                    // Task model 
                    $user_credit = Task::GetUserRemainingCredit($user_id);
                    $crd_request["user_id"]= $user_id;
                    $crd_request["credit_type"] = "in";
                    $crd_request["total_credit"] = $user_credit + $product_info[0]->credit_amount;
                    $crd_request["credit_price"] =  $request->price;
                    $crd_request["credit_amount"] =  $product_info[0]->credit_amount;
                    $crd_request["product_id"] = $product_info[0]->product_id;

                    $save_crd_hist = Credit::AddCreditHistory($crd_request);
                    
                    if($save_crd_hist>0){
                        Credit::UpdateUserCredit($user_id, $crd_request['total_credit']);
                        return response()->json(['message' => 'Credit successfully added to your account'], 200);
                    }
                    else{
                        return response()->json(['message' => 'Something Went Wrong Please try one more time'], 400);
                    }
                    //Credit::AddUserCredit($user_id, ($request['total_credit']));  
                }
                else{
                    return response()->json(['message' => 'Invalid payment key please try agian.'], 400);
                }
            }
            else{
                return response()->json(['message' => 'Product price is invalid'], 400);
            }
        }else{
            return response()->json(['message' => 'No product found'], 400);
        }
        // Nett t add amount and Description
       
    }
}
