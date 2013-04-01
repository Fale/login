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
                'user_id' => $user,
                'name' => Input::get('nome'),
                'surname' => Input::get('cognome'),
                'city' => Input::get('citta'),
                'province' => Input::get('provincia'),
                'phone' => Input::get('telefono')
            )))
            {
                Auth::login($user);
                return Redirect::route('profile');
            }
        }
        else
            return Redirect::route('register')
                ->with('flash_error', 'Your datais wrong')
                ->withInput();
    }
}
