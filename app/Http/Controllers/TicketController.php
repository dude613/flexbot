<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('modules.tickets.index');
    }
    public function tickets(){
        return view('modules.tickets.support');
    }
    public function create(){
        return view('modules.tickets.create');
    }
    public function show($id){
        $data['id'] = $id;
        return view('modules.tickets.ticket_details',$data);
    }
}
