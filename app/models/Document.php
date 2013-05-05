<?php

class Document extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
        'type' => 'required',
        'number' => 'required',
        'provider' => 'required',
        'provided' => array('required', 'date_format:d/m/Y'),
        'expiry' => array('required', 'date_format:d/m/Y')
	);

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

    // TODO: Use FK instead of this work-around
    public function typeName()
    {
        return DocumentType::find($this->type)->name;
    }
}
