<?php

class AccountController extends BaseController {

    public function login()
    { 
        $user = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user)) {
            return Redirect::route('profile')
                ->with('flash_notice', 'You are successfully logged in.');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
	}
    
    public function logout()
    {
        Auth::logout();
        return Redirect::route('login')
            ->with('flash_notice', 'You are successfully logged out.');
    }

    public function register()
    {
        $user = User::create( array(
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'cf' => Input::get('cf')
        ));

        if ($user)
        {
            if (UserInfo::create( array(
                'user_id' => $user->id,
                'name' => Input::get('nome'),
                'surname' => Input::get('cognome'),
                'city' => Input::get('citta'),
                'province' => Input::get('provincia'),
                'phone' => Input::get('telefono')
            )))
            {
                if(EmailCheck::sendToken($user->id))
                {
                    Auth::login($user);
                    return Redirect::route('profile')
                        ->with('flash_notice', 'Il tuo account è stato correttamente creato. Controlla la mail per attivare il tuo account');
                }
            }
        }
        else
            return Redirect::route('register')
                ->with('flash_error', 'Your datais wrong')
                ->withInput();
    }

    public function remindPassword()
    {
        $credentials = array('email' => Input::get('email'));
        Password::remind($credentials);
        if (Session::has('error'))
            return Redirect::route('remindPassword')
                ->with('flash_error', 'Email not found');
        else
            return Redirect::route('login')
                ->with('flash_notice', 'Email inviata con successo');

    }

    public function resetPassword(){

        $credentials = array('email' => Input::get('email'));

        return Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);
            $user->save();
            return Redirect::route('login')
                ->with('flash_notice', 'Your password has been changed');
        });
    }

    public function checkMail($token){
        if (EmailCheck::checkToken($token))
            return Redirect::route('profile')
                ->with('flash_notice', 'Account validato correttamente');
        else
            return Redirect::route('profile')
                ->with('flash_error', 'Errore nella validazione dell\'account');
    }
}
