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

Route::get('/', array('as' => 'home', function () { }));
Route::get('login', array('as' => 'login', function () { return View::make('login'); }))->before('guest');
Route::post('login', function () { });
Route::get('logout', array('as' => 'logout', function () { }))->before('auth');
Route::get('profile', array('as' => 'profile', function () { }))->before('auth');

/*Route::get('/', function() { return View::make('login'); });
Route::get('/register', function() { return View::make('register'); });
Route::get('/lostpass', function() { return View::make('lostpass'); });*/
