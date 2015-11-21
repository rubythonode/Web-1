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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//facebook login
Route::get('/login/facebook', 'Auth\AuthController@getFacebookAuthorization');
Route::get('/login/facebook/callback', 'Auth\AuthController@facebookRetrieving');

//images controller
Route::get('img/{file?}', 'FileController@img')->where('file', '(.*)');

//user account verification
Route::get('verification/{token}', 'UserController@accountVerification');

// home controllers
Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);

Route::group(['prefix' => 'home'], function () {

    Route::get('/', 'HomeController@index');

});

// admin panel
Route::group(['prefix' => 'apanel', 'roles' => ['root', 'admin'], 'middleware' => ['auth', 'roles']], function () {

	Route::resource('users', 'UsersController');

});

//support panel
Route::group(['prefix' => 'support', 'roles' => ['root', 'admin', 'support'], 'middleware'=>['auth', 'roles']], function () {

	Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);

});

// clients panel
Route::group(['prefix'=>'client', 'roles' => ['root', 'admin', 'client'], 'middleware'=>['auth', 'roles']], function () {

	Route::resource('users', 'UsersController', ['only' => ['update', 'show', 'edit']]);

});

