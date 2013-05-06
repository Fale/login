<?php

class AccountController extends BaseController {

    public function postLogin()
    { 
        $user = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user)) {
            User::where('id', Auth::user()->id)->update(array('lastaccess' => date('Y-m-t H:i:s')));
            if (!Auth::user()->checked)
                Session::put('flash_activation', 'Devi attivare il tuo account. Controlla la tua mail');
            if (!Document::where('user_id', Auth::user()->id)->count())
                Session::put('flash_document', 'Non hai ancora caricato nessun documento');
            return Redirect::route('profile.index')
                ->with('flash_notice', 'You are successfully logged in.');
        }
        
        return Redirect::route('login')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
	}
    
    public function getRegister()
    {
        return View::make(t('account.register'));
    }

    public function postRegister()
    {
        $rules = array(
            'nome' => 'required',
            'cognome' => 'required',
            'citta' => 'required',
            'provincia' => array('required', 'size:2'),
            'email' => array('required', 'email', 'unique:users,email'),
//            'telefono' => 'required',
//            'cf' => array('required', 'regex:"[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]"s'), //TODO filter to validate cf
            'tesserato' => 'required',
            'password' => array('required', 'confirmed'),
            'privacy' => 'accepted',
            'privacy2' => 'accepted'
        );

        $validator = Validator::make(Input::all(), $rules);

        if( $validator->fails())
            return Redirect::route('register')
                ->withErrors($validator)
                ->withInput();

        $user = User::create(array(
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'cf' => Input::get('cf')
        ));

        if ($user)
        {
            if (UserInfo::create(array(
                'user_id' => $user->id,
                'name' => Input::get('nome'),
                'surname' => Input::get('cognome'),
                'city' => Input::get('citta'),
                'province' => Input::get('provincia'),
                'phone' => Input::get('telefono'),
                'tesserato' => Input::get('tesserato'),
                'group' => Input::get('comitato')
            )))
            {
                PhpbbUser::changePassword($user->id, $user->email, Input::get('password'));
                Session::put('flash_activation', 'Devi attivare il tuo account. Controlla la tua mail');
                Session::put('flash_document', 'Non hai ancora caricato nessun documento');
                if(EmailCheck::sendToken($user->id))
                {
                    Auth::login($user);
                    return Redirect::route('profile.index')
                        ->with('flash_notice', 'Il tuo account è stato correttamente creato. Controlla la mail per attivare il tuo account');
                }
            }
        }
        else
            return Redirect::route('register')
                ->with('flash_error', 'Errore nella creazione dell\'account')
                ->withInput();
    }

    public function getRemindpassword($token = null)
    {
        if ($token)
            return View::make(t('account.resetpassword'))
                ->with('token', $token);
        else
            return View::make(t('account.remindpassword'));
    }

    public function postRemindpassword()
    {
        $credentials = array('email' => Input::get('email'));
        Password::remind($credentials);
        if (Session::has('error'))
            return Redirect::route('remindPassword')
                ->with('flash_error', 'Indirizzo e-mail non trovato');
        else
            return Redirect::route('login')
                ->with('flash_notice', 'E-mail inviata con successo');

    }
    
    public function postResetpassword(){

        $credentials = array('email' => Input::get('email'));

        return Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);
            $user->save();
            PhpbbUser::changePassword($user->id, $user->email, $password);
            return Redirect::route('login')
                ->with('flash_notice', 'La tua password è stata cambiata con successo');
        });
    }
}
