<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('modules.users.index');
    }
    public function profile(){
        return view('modules.users.profile');
    }
    public function user_profile($userId){
        $data['user_id'] = $userId;
        return view('modules.users.user_profile',$data);
    }
    public function info(){
        return view('modules.users.info');
    }
}
