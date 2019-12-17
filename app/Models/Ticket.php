<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ticket extends Model
{
    // Add ticket
    public static function AddTicket($data){
        //echo json_encode($data->ticket_type);
        $data_ticket["ticket_subjects"] =$data->ticket_subjects;
        $data_ticket["ticket_type"] =$data->ticket_type;
        $data_ticket["created_by"] = $data->created_by;

        $ticket_id =DB::table('ticket')->insertGetId($data_ticket);
        if($ticket_id>0){
            $data_ticket_details["ticket_id"] = $ticket_id;
            $data_ticket_details["created_by"] = $data->created_by;
            $data_ticket_details["message"] = $data->message;
            $data_ticket_details["file_url"] = $data->file_url;

            $tsk_detl_rslt = self::AddTicketDetails((object)$data_ticket_details);
            //$ticket_details_id =DB::table('ticket_details')->insertGetId($data_ticket);
            return $tsk_detl_rslt ? true : false ;
        }
        return false;
    }

    //Add Ticket Details as well as reply to a ticket
    public static function AddTicketDetails($data){
        $data_ticket_details["ticket_id"] = $data->ticket_id;
        $data_ticket_details["created_by"] = $data->created_by;
        $data_ticket_details["message"] = $data->message;
        $data_ticket_details["file_url"] = $data->file_url;
        $ticket_details_id =DB::table('ticket_details')->insertGetId($data_ticket_details);
        return $ticket_details_id>0 ? true : false ;
    }
    public static function GetAllTicketListByStatus($status, $user_id){
        $results = '';
        // Check if status is null if yes hen nned to pass null
        if(isset($status)){
            $results = DB::select( DB::raw("call sp_get_all_tickets('".$status."', ".$user_id.")"));
        }else{
            $results = DB::select( DB::raw("call sp_get_all_tickets(null, ".$user_id.")"));
        }
        return $results;
    }
    //Select All Ticket Details list by A ticket id
    public static function GetAllTicketDetailsListById($ticket_id){
        $results = DB::select( DB::raw("select 
        td.ticket_details_id
        ,td.ticket_id
        ,td.created_by
        ,td.message
        ,td.date_created
        ,td.file_url
        ,u.`name`
        ,u.email
        ,u.role_id
        from ticket_details td 
        left join users u on td.created_by = u.id
        where td.ticket_id = 
        ". $ticket_id));
        return $results;
    }

    public static function UpdateTicketStatus($data){
        try{
            $fnl_data["ticket_status"] =  $data["status"];
            $fnl_data["modified_by"] = $data["modified_by"];
            $results = DB::table('ticket')
            ->where('ticket_id', $data['ticket_id'])
            ->limit(1) 
            ->update($fnl_data);

            // echo json_encode($data);
            // exit();
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
