<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        $data['products'] = Product::GetAllActiveProduct();
        return view('web.home',$data);
    }
}
