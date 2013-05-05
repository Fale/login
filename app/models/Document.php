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
}
