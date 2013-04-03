<?php
class Document extends Eloquent {
    
    protected $guarded = array();

    public static function getAll($userId = NULL)
    {
        if (!$userId)
            $userId = Auth::user()->id;
        //implement security check for user inquiring others documents
        $documents = Document::where('user_id', $userId)->where('hidden',false)->get();
        return $documents;
    }
}
