<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Api\V1\Requests\SendMailRequest;


class SendEmail extends Model
{
    //
    public static function basic_email($temail , $subject, $messageBody) {
        $data = array('MessageBody'=>$messageBody);
//        $temail = $request->to_email;
//        $subject = $request->subject;
        try{
            Mail::send(['html'=>'mail'], $data, function($message) use ($temail, $subject)  {
                $message->to($temail, 'Flex Bot')->subject($subject);
                $message->from('noreply@bflexd.com','Flex Bot');
            });
            return true;
        }
        catch(Exception  $e){
            return false;
        }


    }
}
