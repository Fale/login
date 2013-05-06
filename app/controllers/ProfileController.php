<?php

class ProfileController extends BaseController {

    public function getIndex()
    {
        return View::make(t('profile.index'));
    }

    public function getEdit()
    {
        return View::make(t('profile.edit'));
    }

    public function getLogout()
    {
        Auth::logout();
        if (Session::has('flash_activation'))
            Session::forget('flash_activation');
        if (Session::has('flash_document'))
            Session::forget('flash_document');
        return Redirect::route('login')
            ->with('flash_notice', 'You are successfully logged out.');
    }

    public function getCheckmail()
    {
        return View::make(t('profile.checkmail'));
    }

    public function postCheckmail()
    {
        if(EmailCheck::sendToken(Auth::user()->id))
            return Redirect::route('profile.index')
                ->with('flash_notice', 'L\'email di autenticazione ti è stata rinviata correttamente');
        else
            return Redirect::route('checkmail')
                ->with('flash_error', 'Errore nell\'invio della mail');
    }

    public function getChecktoken($token)
    {
        if (EmailCheck::checkToken($token)) {
            if (Session::has('flash_activation'))
                Session::forget('flash_activation');
            PhpbbUser::activeUser(Auth::user()->id);
            return Redirect::route('profile.index')
                ->with('flash_notice', 'Account validato correttamente');
        }
        else
            return Redirect::route('profile.index')
                ->with('flash_error', 'Errore nella validazione dell\'account');
    }

    public function getDeletemail()
    {
        return View::make(t('profile.deletemail'));
    }

    public function postDeletemail()
    {
        if(DeleteCheck::sendToken(Auth::user()->id))
            return Redirect::route('profile.index')
                ->with('flash_notice', 'L\'email di eliminazione dell\'account è stata inviata correttamente');
        else
            return Redirect::route('checkmail')
                ->with('flash_error', 'Errore nell\'invio della mail');
    }

    public function getDeletetoken($token)
    {
        if (DeleteCheck::checkToken($token)) {
            if (Session::has('flash_activation'))
                Session::forget('flash_activation');
            User::find(Auth::user()->id)->delete();
            UserInfo::find(Auth::user()->id)->delete();
            PhpbbUser::deleteUSer(Auth::user()->id);
            AccountController::logout();
            return Redirect::route('login')
                ->with('flash_notice', 'Account eliminato correttamente');
        }
        else
            return Redirect::route('profile.index')
                ->with('flash_error', 'Errore nell\'eliminazione dell\'account');
    }
}
