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
Route::get('/', array('as' => 'login', function () { return View::make('login'); }))->before('guest');
Route::post('login', array('uses' => 'AccountController@login'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AccountController@logout' ))->before('auth');

// Registration
Route::get('register', array('as' => 'register', function() {  return View::make('register'); }))->before('guest');
Route::post('register', array('uses' => 'AccountController@register'));

// Lost Password
Route::get('remindpassword', array('as' => 'register', function() {  return View::make('remindpassword'); }))->before('guest');
Route::post('password/remind', array( 'uses' => 'AccountController@remindPassword'));

// Profile
Route::get('profile', array('as' => 'profile', function() {  return View::make('profile'); }))->before('auth');
