<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Credit extends Model
{
    protected $fillable = [
        'user_id','credit_amount','created_by','modified_by'
    ];
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    //Buy User Credit 
    public static function AddCreditHistory($data){
        // echo json_encode($data->user_id);
        // exit();
        //$id = DB::table('users')->insertGetId(['name' => 'Ivanka', 'email' => 'ivanka@ivanka.com']); 
        $credit_id = DB::table('credit_history')
            ->insertGetId(['user_id' => $data["user_id"]
            ,'credit_amount' => $data["credit_amount"]
            ,'product_id' => isset($data["product_id"]) ? $data["product_id"] : null
            ,'credit_type' => $data["credit_type"]
            ,'credit_price' => isset($data["credit_price"]) ? $data["credit_price"] : null
            ,'total_credit' => $data["total_credit"]
            ,'created_by' => isset($data["created_by"]) ? $data["created_by"] : $data["user_id"]
            ]);
            return $credit_id;
    }

    //Decrease User Credit by User Id 
    public static function UpdateUserCredit($user_id, $new_credit){
        $results = DB::table('user_details')
            ->where('user_id', $user_id)
            ->update(['user_credit' =>DB::raw($new_credit)]);
            return $results;
    }

    public static function UserCreditHistory($user_id){
        $results = '';
        // Check if status is null if yes hen nned to pass null
        
            $results = DB::select( DB::raw("call sp_user_credit_history(".$user_id.")"));
           
        return $results;
    }


}
