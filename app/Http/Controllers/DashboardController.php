<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['products'] = Product::GetAllActiveProduct();
        return view('dashboard',$data);
    }
    public function user_dashboard(){
        $data['products'] = Product::GetAllActiveProduct();
        return view('user_dashboard',$data);
    }
}
