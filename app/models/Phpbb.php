<?php
class Phpbb extends Eloquent {
    
    public $connection = 'phpbb';
    public $timestamps = false;
    protected $guarded = array();
    protected $table = 'phpbb_users';

    public static function changePassword($id, $email, $password)
    {
        $user = Phpbb::where('user_email', $email)->first();
        if ($user) {
            if ($user->user_password != md5($password))
                Phpbb::where('user_email', $email)->update(array('user_password' => md5($password)));
        }
        else
        {
            $lu = User::find($id);
            $lui = UserInfo::find($id);
            $user = new Phpbb;
            $user->user_id = Phpbb::max('user_id') + 1;
            $user->username = $lui->name . " " . $lui->surname;
            $user->user_password = md5($password);
            $user->user_email = $email;
            $user->save();
        }
        var_dump( md5($password));
        var_dump( $password);
    }

}
