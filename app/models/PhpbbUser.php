<?php
class PhpbbUser extends Eloquent {
    
    public $connection = 'phpbb';
    public $timestamps = false;
    protected $guarded = array();

    public static function changePassword($id, $email, $password)
    {
        $user = PhpbbUser::where('user_email', $email)->first();
        if ($user) {
            if ($user->user_password != md5($password))
                PhpbbUser::where('user_email', $email)->update(array('user_password' => md5($password)));
        }
        else
        {
            $lu = User::find($id);
            $lui = UserInfo::find($id);
            $user = new PhpbbUser;
            $user->user_id = PhpbbUser::max('user_id') + 1;
            $user->user_active = 0;
            $user->username = $lui->name . " " . $lui->surname;
            $user->user_password = md5($password);
            $user->user_email = $email;
            $user->save();
        }
    }

    public static function activeUser($id)
    {
        $lu = User::find($id);
        $lui = UserInfo::find($id);
        if (PhpbbUser::where('user_email', $lu->email)->update(array('user_active' => 1)))
            return 1;
        else
            return 0;
    }

}
