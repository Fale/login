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

Route::get('/', array('as' => 'login', function () { return View::make('login'); }))->before('guest');
Route::post('login', array('uses' => 'AccountController@doLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AccountController@logout' ))->before('auth');
Route::get('profile', array('as' => 'profile', function() {  return View::make('profile'); }))->before('auth');
Route::get('register', array('as' => 'register', function() {  return View::make('register'); }))->before('guest');
Route::post('register', array('uses' => 'AccountController@register'));
