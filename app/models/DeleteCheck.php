<?php
class DeleteCheck extends Eloquent {

    protected $guarded = array();
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    public static function sendToken($userId){
        $user = User::find($userId);
        $userInfo = UserInfo::find($userId);
        $data = Array(
            'token' => DeleteCheck::createToken(),
            'email' => $user->email,
            'namestamp' => $userInfo->name . " " . $userInfo->surname
        );
//        if (!EmailCheck::where('id', $user->id)->count())
            DeleteCheck::insert(array('user_id' => $user->id, 'token' => $data['token'], 'created_at' => date('Y-m-t H:i:s')));
//        else
//            EmailCheck::where('user_id', $user->id)->update(array('token' => $data['token'], 'created_at' => date('Y-m-t H:i:s')));
        Mail::send(t('emails.deletemail'), $data, function($m) use ($data)
        {
            $m->to($data['email'], $data['namestamp'])->subject('Rimozione account FareinRete.It');
        });
        return 1; // No error handling
    }

    public static function checkToken($token)
    {
        $ok = DeleteCheck::where('token', $token)->first();
        if( $ok->user_id ){
            User::where('id', $ok->user_id)->update(array('checked' => 1));
            DeleteCheck::where('token', $token)->delete();
            return 1;
        }
        else
            return 0;

    }

    public static function createToken($length = 32) {
	    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    	$size = strlen($chars);
        $str = "";
	    for($i = 0; $i < $length; $i++) {
		    $str .= $chars[rand(0, $size - 1)];
    	}
    	return $str;
    }
}
