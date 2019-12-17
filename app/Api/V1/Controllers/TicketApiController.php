<?php

namespace App\Api\V1\Controllers;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\TicketRequest;
use App\Api\V1\Requests\TicketReplyRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Dingo\Api\Http\Request;

class TicketApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', []);
    }
    //
    public function AddTicket(TicketRequest $request){
        $user_id = Auth::user()->id;
        $request['created_by'] =  $user_id;
        $ticket_file = "";
        if(isset($request->file_name) && $request->file_name != ''){
            // Copy file from the temporary directory.
            $ticket_file =  Helper :: MoveTemporaryfile($request->file_name, "Ticket");
            if($ticket_file == null)
                return response()->json(['message' => 'File not found please try again.'], 400);
        }
        
        // Set file  url of the task.
        $request["file_url"] = $ticket_file;
        $result = Ticket::AddTicket($request);
        if($result){
            return response()->json(['message' => 'Ticket created Successfully.'], 200);
        }
        else{
            return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 404);
        }

    }
    public function ReplyaTicket(TicketReplyRequest $request){
        $user_id = Auth::user()->id;
        $request['created_by'] =  $user_id;
        $ticket_file = "";
        if(isset($request->file_name) && $request->file_name != ''){
            // Copy file from the temporary directory.
            $ticket_file =  Helper :: MoveTemporaryfile($request->file_name, "Ticket");
            if($ticket_file == null)
                return response()->json(['message' => 'File not found please try again.'], 400);
        }
        
        // Set file  url of the task.
        $request["file_url"] = $ticket_file;
        $result = Ticket::AddTicketDetails($request);
        if($result){
            return response()->json(['message' => 'Ticket replied Successfully.'], 200);
        }
        else{
            return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 404);
        }

    }
    
    public function GetAllTicketListByStatus(Request $request){
        //$user_id = Auth::user()->id;
        // $request['created_by'] =  $user_id;
        $custmoer_id = isset($request->user_id) ? $request->user_id : 'null';
        // echo $request->user_id;
        // exit();
        $result = Ticket::GetAllTicketListByStatus($request->status, $custmoer_id);
        return $result;
    }
    
    public function GetAllTicketDetailsListById(Request $request){
        // $user_id = Auth::user()->id;
        // $request['created_by'] =  $user_id;
        $result = Ticket::GetAllTicketDetailsListById($request->ticket_id);
        return $result;
    }

    public function UpdateTicketStatus(Request $request){
       
        $user_id = Auth::user()->id;
        $data["modified_by"] = $user_id;
        $data["status"] = $request->status;
        $data["ticket_id"] = $request->ticket_id;
        // echo json_encode($request->statudeds);
        // exit();
        $result = Ticket::UpdateTicketStatus($data);
        if($result){
            return response()->json(['message' => 'Ticket status updated Successfully.'], 200);
        }
        else{
            return response()->json(['message' => 'Something Went Wrong Please try one more time.'], 404);
        }
    }
}
