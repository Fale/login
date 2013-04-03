<?php

class DocumentController extends BaseController {

	public function add()
	{
        if (Input::get('user_id'))
            $user = Input::get('user_id');
        else
            $user = Auth::user()->id;
        $document = array(
            'user_id' => $user,
            'type' => Input::get('type'),
            'number' => Input::get('number'),
            'provider' => Input::get('provider'),
            'provided' => Input::get('provided'),
            'expiry' => Input::get('expiry')
        );
        if (Document::insert($document)) {
            if (Session::has('flash_document'))
                Session::forget('flash_document');
            return Redirect::route('documents')
                ->with('flash_notice', 'Documento inserito con successo');
        }
        else
            return Redirect::route('documentAdd')
                ->with('flash_error', 'Errore nell\'inserimento');
	}

}
