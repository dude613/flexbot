<?php

namespace App;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use DB;
use Auth;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password','role_id','verify_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->hasOne('App\Models\Role','id','role_id');
    }

    public function credit() {
        return $this->belongsTo('App\Models\Credit');
    }

    public static function GetAllCustomer(){
        $results = DB::select( DB::raw("SELECT u.id,  u.name, u.email, u.role_id ,ud.first_name ,ud.last_name ,ud.country,ud.city ,ud.organization,ud.phone"
                                .",ud.billing_address,ud.billing_city,ud.billing_zip_code,ud.card_no,ud.user_image_url,ud.user_credit,ud.date_created,ud.date_modified,ud.modified_by"
                                ." FROM  users u"
                                ." left join user_details ud on u.id = ud.user_id"
                                ." Where u.role_id = '3'"));
        return $results;
    }

    public static function SaveUserDetails($userid, $first_name, $last_name ){
        $user_details['user_id']  = $userid;
        $user_details['first_name']  = $first_name;
        $user_details['last_name']  = $last_name;
        $result =DB::table('user_details')->insertGetId($user_details);
        if($result>0){ // If task details inserted then return true
            return true;
        }
        else return false;
    }

    public static function GetUserDetailsbyId($user_id){

        $result = DB::select( DB::raw("select u.id user_id".
                                        ", ud.first_name".
                                        ", ud.last_name".
                                        ", u.email".
                                        ", ud.phone".
                                        ", ud.city".
                                        ", ud.country".
                                        ", ud.organization".
                                        ", ud.billing_address".
                                        ", ud.billing_city".
                                        ", ud.billing_zip_code".
                                        ", ud.card_no, ud.user_image_url, ud.is_active, ud.user_credit,  u.created_at, u.role_id, r.name role_name  from users u".
                                        " left join user_details ud on u.id = ud.user_id".
                                        " left join roles r on u.role_id = r.id".
                                        " where u.id = ".$user_id));
                if(count($result)>0)
                    return $result[0];
                return null;
    }
    public static function UpdateUser($data){
        // echo json_encode($data);
        // exit();
        $fnl_data = array();

        try{
            foreach($data as $key=>$value){
                if(!empty($data[$key]) && $key !== "email" && $key !== "user_credit"){
                    $fnl_data[$key] = $value;
                }
            }

            if(isset($data['first_name']) && $data['first_name'] !='' && isset($data['last_name']) && $data['last_name'] !=''){
                $usr_data['name'] = $data['first_name'] . ' '. $data['last_name'];
                $user_results = DB::table('users')
                ->where('id', $data['user_id'])
                ->limit(1) 
                ->update($usr_data);
            }
            $fnl_data["modified_by"] = $data['user_id'];
            $results = DB::table('user_details')
            ->where('user_id', $data['user_id'])
            ->limit(1) 
            ->update($fnl_data);
            if($results){
                    return true;
            }
            return false;
        }
        catch(Exception $e){
            return false;
        }
    }


    public static function isEmailExist($email){
        //$isexist = 
        return DB::table('users')->where('email', $email)->exists();
    }
    public static function isemailVerified($email){
        return DB::table('users')
            ->where('email', $email)
            ->where('is_email_verified', 1)
            ->exists();
    }

    public static function ConfirmedEmail($email, $verifyCode){
        $usrd_update = [
            'is_email_verified' => 1,
            'verify_code'=> ''
        ];
        $isCodeexist = DB::table('users')
            ->where('email', $email)
            ->where('verify_code', $verifyCode)->exists();
        if($isCodeexist){
            $rslt = DB::table('users')
            ->where('email', $email)
            ->where('verify_code', $verifyCode)
            ->update($usrd_update);
            if($rslt){
                return true;
            }
            return false;
        }
        return false;
           
    }
    public static function NewVerificationCode($email, $verifyCode){
        $usrd_update = [
            'is_email_verified' => 0,
            'verify_code'=> $verifyCode
        ];
        $result = DB::table('users')
            ->where('email', $email)
            ->update($usrd_update);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Automatically creates hash for the user password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
