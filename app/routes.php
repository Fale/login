<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

function t($view)
{
    $uri = str_replace("/bootstrap/..","",app_path()) . "/views/" . Config::get('template') . "/" . str_replace(".","/",$view) . ".blade.php";
    if(file_exists($uri))
        return Config::get('template') . "." . $view;
    else
        return "default." . $view;
}

// Login and Logout
Route::get('/', array('as' => 'login', function () { return View::make(t('account.login')); }))->before('guest');
Route::post('login', array('uses' => 'AccountController@login'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AccountController@logout' ))->before('auth');

// Registration
Route::get('register', array('as' => 'register', function() { return View::make(t('account.register')); }))->before('guest');
Route::post('register', array('uses' => 'AccountController@register'));

// Email Check
Route::get('checkmail/{token}', array('uses' => 'AccountController@checkMail'));
Route::post('checkmail', array('uses' => 'AccountController@askCheckMail'));
Route::get('checkmail', array('as' => 'checkmail', function() { return View::make(t('account.checkmail')); }))->before('auth');

// Delete accounts
Route::get('delete/{token}', array('uses' => 'AccountController@deleteUser'));
Route::post('delete', array('uses' => 'AccountController@askDeleteMail'));
Route::get('delete', array('as' => 'delete', function() { return View::make(t('account.deletemail')); }))->before('auth');

// Lost Password
Route::get('remindpassword', array('as' => 'remindPassword', function() { return View::make(t('account.remindpassword')); }))->before('guest');
Route::post('remindpassword', array( 'uses' => 'AccountController@remindPassword'));
Route::get('remindpassword/{token}', function($token) { return View::make(t('account.resetpassword'))->with('token', $token); });
Route::post('resetpassword', array( 'uses' => 'AccountController@resetPassword'));

// Autenticated stuff
Route::group(array('before' => 'auth'), function()
{
    // Profile
    Route::get('profile', array('as' => 'profile.index', function() {  return View::make(t('profile.index')); }));
    Route::get('profile/edit', array('as' => 'profile.edit', function() {  return View::make(t('profile.edit')); }));

    // Document
    Route::resource('profile/documents', 'DocumentsController');
});
