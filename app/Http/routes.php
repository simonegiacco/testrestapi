<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::group(['namespace' => 'Web'], function () {

    get('login', 'UserController@getLogin');
    post('login', 'UserController@login');
    get('register', 'UserController@getRegister');
    post('register', 'UserController@register');

    Route::group(['middleware' => 'auth'], function () {
        get('logout', 'UserController@logout');

        get('profile/{username}', 'UserController@getProfile');
    });

});

// Password reset link request routes...
get('password/email', 'Auth\PasswordController@getEmail');
post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
get('password/reset/{token}', 'Auth\PasswordController@getReset');
post('password/reset', 'Auth\PasswordController@postReset');

/*
 * API Routes
 */
Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {

    post('register', 'UserController@register');
    post('login', 'UserController@login');

    Route::group(['middleware' => 'auth'], function () {
        get('logout', 'UserController@logout');
    });

});