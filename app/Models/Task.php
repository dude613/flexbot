<?php

namespace App\Models;

use App\Models\SendEmail;
use DB;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_id','task_type','created_by','modified_by', 'status', 'admin_notes', 'admin_submited_files'
    ];

    // Get All Task By Task Type
    public static function GetAllTaskByType($taskType){
        $sql = '';
        if($taskType != ''){
            $sql  = "select t.task_id,t.task_type,t.created_by, CONCAT(ud.first_name,' ',ud.last_name) full_name, u.email, t.date_created,t.modified_by,t.date_modified,t.status,td.task_details_id, td.data_location,td.search_item,td.search_term,td.location,td.additional_info,td.date_created,td.file_url".
             " from task t".
             " left join task_details td on t.task_id  = td.task_id".
             " left join user_details ud on t.created_by = ud.user_id".
             " left join users u on t.created_by = u.id". 
             " where t.task_type = '".$taskType."' order by t.date_created desc limit 5000";
        }
        else{
            $sql  = "select t.task_id,t.task_type,t.created_by, CONCAT(ud.first_name,' ',ud.last_name) full_name, u.email, t.date_created,t.modified_by,t.date_modified,t.status,td.task_details_id, td.data_location,td.search_item,td.search_term,td.location,td.additional_info,td.date_created,td.file_url".
            " from task t".
            " left join task_details td on t.task_id  = td.task_id".
            " left join user_details ud on t.created_by = ud.user_id".
            " left join users u on t.created_by = u.id". 
            " order by t.date_created desc limit 5000";
        }
        $results = DB::select( DB::raw($sql));
        return $results;
    }
     // Get All Task By Task id
     public static function GetTaskById($taskId){
        $result = DB::select("select t.task_id,t.task_type,t.created_by, CONCAT(ud.first_name,' ',ud.last_name) full_name, u.email, t.date_created,t.modified_by,t.date_modified,t.status, t.admin_notes,t.admin_submited_files,td.task_details_id, td.data_location,td.search_item,td.search_term,td.location,td.additional_info,td.date_created,td.file_url".
        " from task t".
        " left join task_details td on t.task_id  = td.task_id".
        " left join user_details ud on t.created_by = ud.user_id". 
        " left join users u on t.created_by = u.id". 
        " where t.task_id = ".$taskId);

        return $result;
    }
    // Get All Task By User
    public static function GetAllTaskByUser($taskType, $userId){
        $sql = '';
        if($taskType !=''){
            $sql = "select t.task_id,t.task_type, t.created_by, CONCAT(ud.first_name,' ',ud.last_name) full_name, u.email, t.date_created, t.admin_submited_files,t.modified_by,t.date_modified,t.status,td.task_details_id, td.data_location,td.search_item,td.search_term,td.location,td.additional_info,td.date_created,td.file_url from task t".
            " left join task_details td on t.task_id  = td.task_id".
            " left join user_details ud on t.created_by = ud.user_id". 
            " left join users u on t.created_by = u.id". 
            " where t.task_type = '".$taskType."' and t.created_by ='". $userId."' order by t.date_created desc limit 5000";
        }
        else{
            $sql = "select t.task_id,t.task_type, t.created_by, CONCAT(ud.first_name,' ',ud.last_name) full_name,u.email, t.date_created, t.admin_submited_files,t.modified_by,t.date_modified,t.status,td.task_details_id, td.data_location,td.search_item,td.search_term,td.location,td.additional_info,td.date_created,td.file_url from task t".
            " left join task_details td on t.task_id  = td.task_id".
            " left join user_details ud on t.created_by = ud.user_id".
            " left join users u on t.created_by = u.id".  
            " where t.created_by ='". $userId."' order by t.date_created desc limit 5000";
        }
        $results = DB::select( DB::raw($sql));
        return $results;
    }
    // Insert a task and get id
    public static function AddTask1($data){
            $tsk_data['task_type'] = $data["task_type"];
            $tsk_data['created_by'] = $data["created_by"];
            $task_id =DB::table('task')->insertGetId($tsk_data);
        if($task_id > 0){ // Check if task has already inserted or not

                if($tsk_data['task_type'] == "Task 2"){
                    $tsk_details['task_id'] = $task_id;
                    $tsk_details['data_location'] = $data['data_location'];
                    $tsk_details['additional_info'] = $data['additional_info'];
                    $tsk_details['file_url'] = $data['file_url'];
                    $result =DB::table('task_details')->insertGetId($tsk_details);
                    if($result>0){ // If task details inserted then return true
                        return true;
                    }
                }
                else{
                    $tsk_details['task_id'] = $task_id;
                    $tsk_details['data_location'] = $data['data_location'];
                    $tsk_details['search_item'] = $data['search_item'];
                    $tsk_details['search_term'] = $data['search_term'];
                    $tsk_details['required_term'] = $data['required_term'];
                    $tsk_details['location'] = $data['location'];
                    $tsk_details['additional_info'] = $data['additional_info'];
                    //$tsk_details['file_url'] = $data['file_url'];

                    $result =DB::table('task_details')->insertGetId($tsk_details);
                    if($result>0){ // If task details inserted then return true
                        return true;
                }
            }
        }
        return false;
    }
    //Get User Remaining Credit by User Id
    public static function GetUserRemainingCredit($user_id){
        $results = DB::select( DB::raw("select user_credit from user_details where user_id = ". $user_id));
        // echo json_encode($results);
        // exit();
        if(count($results)>0)
            return $results[0]->user_credit;
        return 0;
    }
    
    //Add Task Details By Task ID
    public static function AddTaskDetails($data){
        $result =DB::table('task_details')->insertGetId($data);
        return $result;
    }
    public static function UpdateTask($data){
        
        $task = [];
        $task["modified_by"] = $data["modified_by"];
        if(isset($data["admin_submited_files"])){
            $task["admin_submited_files"] = $data["admin_submited_files"];
        }
        if(isset($data["admin_notes"])){
            $task["admin_notes"] = $data["admin_notes"];
        }
        if(isset($data["status"])){
            $task["status"] = $data["status"];
            if($data["status"] == "complete"){
                SendEmail::basic_email($data["customer_email"], 'Task Completed', 'Your Task : '.$data['task_id'] .' is now complete. files are in your portal');
            }
        }
        if(isset($data["modified_by"])){
            $task["modified_by"] = $data["modified_by"];
        }
        // echo json_encode((array)$task);
        // exit();
        try{
            $results = DB::table('task')
            ->where('task_id', $data['task_id'])
            ->limit(1) 
            ->update($task);
            if($results){
                    return true;
            }
            return false;
        }
        catch(Exception $e){
            return false;
        }
        
    }

}
