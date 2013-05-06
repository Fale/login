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

// Authenticated stuff
Route::group(array('before' => 'auth'), function()
{
    // Document
    Route::resource('profile/documents', 'DocumentsController');

    // Profile
    Route::controller('profile', 'ProfileController', Array(
        'getLogout' => 'profile.logout',
        'getIndex' => 'profile.index',
        'getEdit' => 'profile.edit',
        'getCheckmail' => 'profile.checkmail',
        'getChecktoken' => 'profile.checktoken',
        'getDeletetoken' => 'profile.deletetoken',
        'getDeletemail' => 'profile.deletemail',
    ));
});

// FIXME: work-around fo bug https://github.com/laravel/framework/commit/6b2de61c4cd86e707b09edca94f39b73e0060b89#commitcomment-3133249
Route::get('/', array('as' => 'login', function () { return View::make(t('account.login')); }))->before('guest');

// Unauthenticated stuff
Route::group(array('before' => 'guest'), function()
{
    //Autentication
    Route::controller('/', 'AccountController', Array(
        'getRegister' => 'register',
        'getRemindpassword' => 'remindPassword',
    ));
});
