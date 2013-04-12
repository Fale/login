<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"        => ":attribute deve essere accettato.",
	"active_url"      => "Il :attribute non è valido.",
	"after"           => "The :attribute must be a date after :date.",
	"alpha"           => "The :attribute may only contain letters.",
	"alpha_dash"      => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"       => "The :attribute may only contain letters and numbers.",
	"before"          => "The :attribute must be a date before :date.",
	"between"         => array(
		"numeric" => "The :attribute must be between :min - :max.",
		"file"    => "The :attribute must be between :min - :max kilobytes.",
		"string"  => "The :attribute must be between :min - :max characters.",
	),
	"confirmed"       => "I campi :attribute devono combaciare.",
	"date"            => "The :attribute is not a valid date.",
	"date_format"     => "The :attribute does not match the format :format.",
	"different"       => "The :attribute and :other must be different.",
	"digits"          => "The :attribute must be :digits digits.",
	"digits_between"  => "The :attribute must be between :min and :max digits.",
	"email"           => "L\'indirizzo email deve essere valido.",
	"exists"          => "The selected :attribute is invalid.",
	"image"           => "The :attribute must be an image.",
	"in"              => "The selected :attribute is invalid.",
	"integer"         => "The :attribute must be an integer.",
	"ip"              => "The :attribute must be a valid IP address.",
	"max"             => array(
		"numeric"     => "The :attribute may not be greater than :max.",
		"file"        => "The :attribute may not be greater than :max kilobytes.",
		"string"      => "The :attribute may not be greater than :max characters.",
	),
	"mimes"           => "The :attribute must be a file of type: :values.",
	"min"             => array(
		"numeric"     => "The :attribute must be at least :min.",
		"file"        => "The :attribute must be at least :min kilobytes.",
		"string"      => "The :attribute must be at least :min characters.",
	),
	"not_in"           => "The selected :attribute is invalid.",
	"numeric"         => "The :attribute must be a number.",
	"regex"           => "Il formato del campo :attribute non è valido.",
	"required"        => "Il campo :attribute è obbligatorio.",
	"required_with"   => "The :attribute field is required when :values is present.",
	"same"            => "The :attribute and :other must match.",
	"size"            => array(
		"numeric"    => "Il campo :attribute deve contenere :size caratteri.",
		"file"       => "The :attribute must be :size kilobytes.",
		"string"     => "The :attribute must be :size characters.",
	),
	"unique"          => "Il valore del campo :attribute è già stato usato in precedenza.",
	"url"             => "The :attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
