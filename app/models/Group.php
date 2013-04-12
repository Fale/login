<?php
class Group extends Eloquent {
    
    protected $guarded = array();

    public static function getArray( $output = Array())
    {
        foreach (Group::select('id','name')->get() as $group)
            $output[$group->id] = $group->name;
        return $output;
    }
}
