<?php

// TODO: Use the User FK instead of this class
class UserInfo extends Eloquent {
    
    protected $guarded = array();
    protected $primaryKey = 'user_id';
}
