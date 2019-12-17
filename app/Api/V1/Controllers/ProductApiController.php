<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function GetAllProduct(Request $request)
    {
        return Product::GetAllActiveProduct();
    }
    public function GetProductById(Request $request)
    {
        return Product::GettProductById($request->product_id);
    }
}
