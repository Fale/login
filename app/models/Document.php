<?php

class Document extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'type' => 'required',
		'provider' => 'required',
		'hidden' => 'required',
		'expiry' => 'required'
	);
}