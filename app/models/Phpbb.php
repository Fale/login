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
            $user->user_active = 0;
            $user->username = $lui->name . " " . $lui->surname;
            $user->user_password = md5($password);
            $user->user_email = $email;
            $user->save();
        }
        var_dump( md5($password));
        var_dump( $password);
    }

    public static function activeUser($id)
    {
        $lu = User::find($id);
        $lui = UserInfo::find($id);
        if (Phpbb::where('user_email', $email)->update(array('user_active' => 1)))
            return 1;
        else
            return 0;
    }

}
