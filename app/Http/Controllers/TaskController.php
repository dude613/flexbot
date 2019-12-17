<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('modules.tasks.index');
    }

    public function create($id){
        if($id==1){
            return view('modules.tasks.create_task_one');
        }
        return view('modules.tasks.create_task_two');
    }

    public function task_list($id){
        if($id==1){
            return view('modules.tasks.task_list_1');
        }
        return view('modules.tasks.task_list_2');
    }
}
