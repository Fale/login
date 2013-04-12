<?php
class DocumentType extends Eloquent {
    
    public $timestamps = false;
    protected $guarded = array();

    public static function getArray( $output = Array())
    {
        foreach (DocumentType::select('id','name')->get() as $group)
            $output[$group->id] = $group->name;
        return $output;
    }

    public function documents()
    {
        return $this->hasMany('Document', 'type');
    }
}
