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

    public function typeName()
    {
        return DocumentType::find($this->type)->name;
    }

    public static function data($data, $return = 0)
    {
        if ($return)
        {
            $rsl = explode ('-',$data);
            $rsl = array_reverse($rsl);
            return implode($rsl,'/');
        }
        else
        {
            $rsl = explode ('/',$data);
            $rsl = array_reverse($rsl);
            return implode($rsl,'-');
        }
    }
}
