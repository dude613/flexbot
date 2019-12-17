<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    public static function GetAllActiveProduct(){
        $results = DB::select( DB::raw("select 
        p.product_id
        ,p.product_name
        ,p.product_type
        ,p.credit_amount
        ,p.price
        ,p.date_created
        ,p.is_active
         from product p where p.is_active = 1"));
        return $results;
    }

    public static function GettProductById($product_id){
        $results = DB::select( DB::raw("select 
        p.product_id
        ,p.product_name
        ,p.product_type
        ,p.credit_amount
        ,p.price
        ,p.date_created
        ,p.is_active
         from product p where p.product_id =".$product_id));
        return $results;
    }
}
