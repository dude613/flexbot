<?php

namespace App\Models;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Database\Eloquent\Model;
use Session;
use Stripe;
use App\Api\V1\Requests\PayRequest;
use Illuminate\Support\Facades\Validator;
use Image;
use File;
class Helper extends Model
{
    public static function getRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $string;
    }

    public static function fileInfo($filePath)
    {
        $file = array();
        $file['name'] = $filePath['filename'];
        $file['extension'] = $filePath['extension'];
        return $file;
    }

    public static function PaymentHelper($request){
        try {
            // echo json_encode($request);
            // exit();
            if (self::StripeValidate($request))
                {
                  
                    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    Stripe\Charge::create ([
                            "amount" => 100 * $request["amount"],
                            "currency" => "usd",
                            "source" => $request["stripeToken"],
                            "description" => $request["description"]
                    ]);
                    Session::flash('success', 'Payment successful!');
                    
                    return true;
                }
                else
                {
                    return false;
                }
          
          } catch (Exception $e) {
          
              return false;
          }
    }

    public static function StripeValidate($data)
    {
        $rules = array(
            'amount' => 'required',
            //'source'=> 'required',
            'description'=> 'required'
        );
        // make a new validator object
        $v = Validator::make($data, $rules);
        // return the result
        return $v->passes();
    }

    public static function UploadFileTemporary($request){
        if($request->file){
            $file = $request->file('file');
            $filename = $request['user_id']. time().'.'.$file->getClientOriginalExtension();
            // Temporary file directiory
            
            $relPath = '/files/temp/'.date('Y').'/'.date('M').'/';
            File::isDirectory(public_path($relPath)) or File::makeDirectory(public_path($relPath), 0777, true, true);
            $destinationPath = public_path($relPath);

            $file ->move($destinationPath, $filename);

            return $filename;
        }
        return null;

    }

    public static function MoveTemporaryfile($file_name, $dist_type){
        $dist_url =  "";
        if($dist_type == "Task"){
            $dist_url =  '/files/task/'.date('Y').'/'.date('M').'/';
        }
        if($dist_type == "Ticket"){
            $dist_url =  '/files/ticket/'.date('Y').'/'.date('M').'/';
        }
        if($dist_type == "Profile"){
            $dist_url =  '/files/profile/'.date('Y').'/'.date('M').'/';
        }
        if($dist_url !=''){
            File::isDirectory(public_path($dist_url)) or File::makeDirectory(public_path($dist_url), 0777, true, true);
            $src_url =  '/files/temp/'.date('Y').'/'.date('M').'/'.$file_name;
            if(file_exists( public_path($src_url))){
                File::move(public_path($src_url), public_path($dist_url. $file_name ));
                return $dist_url . $file_name ;
            }
            return null;
        }
        return null;
    }

    public static function DeleteStoragefile($file_url){
        if(file_exists( public_path($file_url))){
            unlink(public_path($file_url));
            return true;
        }
        return false;
    }
}
