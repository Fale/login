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

// Login and Logout
Route::get('/', array('as' => 'login', function () { return View::make('account.login'); }))->before('guest');
Route::post('login', array('uses' => 'AccountController@login'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AccountController@logout' ))->before('auth');

// Registration
Route::get('register', array('as' => 'register', function() {  return View::make('account.register'); }))->before('guest');
Route::post('register', array('uses' => 'AccountController@register'));

// Email Check
Route::get('checkmail/{token}', array('uses' => 'AccountController@checkMail'));
Route::post('checkmail', array('uses' => 'AccountController@askCheckMail'));
Route::get('checkmail', array('as' => 'checkmail', function() {  return View::make('account.checkmail'); }))->before('auth');

// Lost Password
Route::get('remindpassword', array('as' => 'remindPassword', function() {  return View::make('account.remindpassword'); }))->before('guest');
Route::post('remindpassword', array( 'uses' => 'AccountController@remindPassword'));
Route::get('remindpassword/{token}', function($token) { return View::make('account.resetpassword')->with('token', $token); });
Route::post('resetpassword', array( 'uses' => 'AccountController@resetPassword'));

// Profile
Route::get('profile', array('as' => 'profile', function() {  return View::make('account.profile'); }))->before('auth');

// Document
Route::get('profile/document', array('as' => 'documents', function() {  return View::make('document/list'); }))->before('auth');
Route::post('profile/document', array('uses' => 'DocumentController@add'));
Route::get('profile/document/add', array('as' => 'addDocument', function() {  return View::make('document/add'); }))->before('auth');
Route::get('profile/document/{id}', array('as' => 'document', function($id) {  return View::make('document'); }))->before('auth');
Route::post('profile/document/edit/{id}', array('uses' => 'DocumentController@edit'));
Route::post('profile/document/del/{id}', array('uses' => 'DocumentController@del'));
