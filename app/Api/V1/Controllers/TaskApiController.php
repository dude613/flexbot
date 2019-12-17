<?php

namespace App\Api\V1\Controllers;
use App\Models\Task;
use App\Models\Credit;
use App\Models\Helper;
use App\Api\V1\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use File;



class TaskApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', []);
        $this->middleware('auth.role:1', ['only' => ['UpdateTask']]);
    }
    public function GetAllTaskByType(Request $request){
        return Task::GetAllTaskByType($request->task_type);
    }
    public function GetAllTaskByUser(Request $request){
        $user_id = Auth::user()->id;
        return Task::GetAllTaskByUser($request->task_type, $user_id);
    }
    public function GetTaskById(Request $request){
        $task = collect(Task::GetTaskById($request->task_id))->first();
        if(isset($task->admin_submited_files) && $task->admin_submited_files !== '' && file_exists(public_path($task->admin_submited_files))){
            $file_info = Helper::fileInfo(pathinfo(public_path().$task->admin_submited_files));
            $task->admin_file_name = $file_info['name'];
            $task->admin_file_ext = $file_info['extension'];
            $task->admin_file_size = File::size(public_path($task->admin_submited_files));
        }
        return response()->json($task);
    }
    
    public function FileUpload(Request $request ){
        $user_id = Auth::user()->id;
        $request['user_id'] =  $user_id;
        $fileName = Helper::UploadFileTemporary($request);
        if($fileName !=null)
               return response()->json(['fileName' => $fileName], 200);
       return response()->json(['message' => 'Something went wrong please try again'], 400);
   }

   public function AddTask(TaskRequest $request){
       $user_id = Auth::user()->id;
       // return json_encode($user_id);
       // exit();
       
       $user_credit = Task::GetUserRemainingCredit($user_id);
       // echo $user_credit;
       // exit();
       if($user_credit>0)
       {
           // echo $task_file;
           // exit();
           $request['created_by'] =  $user_id;
           $task_id = Task::AddTask1($request->all());
           if($task_id){
               // decrease the user credit
               Credit::UpdateUserCredit($user_id, (--$user_credit));

               return response()->json(['message' => 'Task Submitted Successfully.'], 200);
           }
           else{
               return response()->json(['message' => 'Something Went Wrong Please try one more time'], 400);
       }
       }else{
           return response()->json(['message' => 'You have no credit please by credit to submit more task.'], 400);
       }


   }
   public function AddTask2(TaskRequest $request){

       $user_id = Auth::user()->id;

       $user_credit = Task::GetUserRemainingCredit($user_id);
       if($user_credit>0)
       {
           $request['task_type'] =  "Task 2";
           $request['created_by'] =  $user_id;
           $task_file = "";
           if(isset($request->file_name) && $request->file_name != ''){
               // Copy file from the temporary directory.
               $task_file =  Helper :: MoveTemporaryfile($request->file_name, "Task");
               if($task_file == null)
                   return response()->json(['message' => 'File not found please try again.'], 400);
           }
           
           // Set file  url of the task.
           $request["file_url"] = $task_file;
           $task_id = Task::AddTask1($request->all());
           if($task_id){
               // decrease the user credit
               Credit::UpdateUserCredit($user_id, (--$user_credit));

               return response()->json(['message' => 'Task Submitted Successfully.'], 200);
           }
           else{
           return response()->json(['message' => 'Something Went Wrong Please try one more time'], 400);
       }
       }else{
           return response()->json(['message' => 'You have no credit please by credit to submit more task.', 'no_credit' => true], 400);
       }
   }

   public function UpdateTask(Request $request){
    $user_id = Auth::user()->id;
    $request['modified_by'] = $user_id;
    
    $task_details = Task :: GetTaskById($request->task_id);
        if($task_details !== null){
            $request['customer_email'] = $task_details[0]->email;

            // echo $request['customer_email'] ;
            // exit();
            if($request->admin_submited_files == '' || $request->admin_submited_files == null){
                if($task_details[0]->admin_submited_files != '')
                    $delete_pre_file = Helper::DeleteStoragefile($task_details[0]->admin_submited_files);
                $request['admin_submited_files'] = '';
            }
            else if(isset($request->admin_submited_files) && $request->admin_submited_files !== '' ){
                // Copy file from the temporary directory.
                //$request->admin_submited_files !== $task_details[0]->admin_submited_files
                 if($request->admin_submited_files !== $task_details[0]->admin_submited_files){
                    $task_file =  Helper :: MoveTemporaryfile($request->admin_submited_files, "Task");
                    if($task_file === null){
                        return response()->json(['message' => 'File not found please try again.'], 400);
                    }
                    $request['admin_submited_files'] = $task_file;
                }
            }else{
                $request['admin_submited_files'] = $task_details[0]->admin_submited_files;
            }
            if(!isset($request->task_id)){
                return response()->json(['message' => 'No task provided to update.'], 400);
            }
            if(Task :: UpdateTask($request->all()))
                return  response()->json(['message' => 'Task updated successfully.'], 200);
            return response()->json(['message' => 'Something went wrong please try agian.'], 400);
        }
       return response()->json(['message' => 'Invalid task provided to update.'], 400);
    }

    public function DeleteStorageFile(Request $request ){
        $file_url= $request->file_url;

            if (isset($file_url)) {
                $result = Helper::DeleteStoragefile($file_url);
                if($result)
                    return response()->json(['message' => 'file deleted successfully.'], 200);
                return response()->json(['message' => 'Something went wrong please try again'], 400);
            } else {
                return response()->json(['message' => 'Something went wrong please try again'], 400);
            }
    }
}
