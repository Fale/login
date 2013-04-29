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
Route::get('register', array('as' => 'register', function() {  return View::make(t('account.register')); }))->before('guest');
Route::post('register', array('uses' => 'AccountController@register'));

// Email Check
Route::get('checkmail/{token}', array('uses' => 'AccountController@checkMail'));
Route::post('checkmail', array('uses' => 'AccountController@askCheckMail'));
Route::get('checkmail', array('as' => 'checkmail', function() {  return View::make(t('account.checkmail')); }))->before('auth');

// Delete accounts
Route::get('delete/{token}', array('uses' => 'AccountController@deleteMail'));
Route::post('delete', array('uses' => 'AccountController@askDeleteMail'));
Route::get('delete', array('as' => 'delete', function() {  return View::make(t('account.deletemail')); }))->before('auth');

// Lost Password
Route::get('remindpassword', array('as' => 'remindPassword', function() {  return View::make(t('account.remindpassword')); }))->before('guest');
Route::post('remindpassword', array( 'uses' => 'AccountController@remindPassword'));
Route::get('remindpassword/{token}', function($token) { return View::make(t('account.resetpassword'))->with('token', $token); });
Route::post('resetpassword', array( 'uses' => 'AccountController@resetPassword'));

// Profile
//Route::get('profile', array('as' => 'profile', function() {  return Redirect::to('http://fareinrete.it'); }))->before('auth');
Route::get('profile', array('as' => 'profile', function() {  return View::make(t('account.dummy')); }))->before('auth');

// Document
Route::get('profile/document', array('as' => 'documents', function() {  return View::make(t('document/list')); }))->before('auth');
Route::post('profile/document', array('uses' => 'DocumentController@add'));
Route::get('profile/document/add', array('as' => 'addDocument', function() {  return View::make(t('document/add')); }))->before('auth');
Route::get('profile/document/{id}', array('as' => 'document', function($id) {  return View::make(t('document')); }))->before('auth');
Route::post('profile/document/edit/{id}', array('uses' => 'DocumentController@edit'));
Route::post('profile/document/del/{id}', array('uses' => 'DocumentController@del'));
