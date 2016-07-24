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


Route::get('/', 'HomeController@home');


// Route::auth();
// Login / Logout Routes...
Route::get('/login', [
  'as' => 'auth.login',
  'uses' => 'Auth\AuthController@showLoginForm'
]);
Route::post('/login', [
  'as' => 'auth.login',
  'uses' => 'Auth\AuthController@login'
]);
Route::get('/logout', [
  'as' => 'auth.logout',
  'uses' => 'Auth\AuthController@logout'
]);

// Registration Routes...
Route::get('/register', [
  'as' => 'auth.register',
  'uses' => 'Auth\AuthController@showRegistrationForm'
]);
Route::post('/register', [
  'as' => 'auth.register',
  'uses' => 'Auth\AuthController@register'
]);

// Password Reset Routes...
Route::get('/password/reset/{token?}', [
  'as' => 'auth.password.reset',
  'uses' => 'Auth\PasswordController@showResetForm'
]);
Route::post('/password/email', [
  'as' => 'auth.password.email',
  'uses' => 'Auth\PasswordController@sendResetLinkEmail'
]);
Route::post('/password/reset', [
  'as' => 'auth.password.reset',
  'uses' => 'Auth\PasswordController@reset'
]);


//  Tests
Route::get('/tests', [
  'as' => 'tests',
  'uses' => 'TestController@getAllTests'
]);

Route::get('/tests/{test_id}', [
  'as' => 'tests.test',
  'uses' => 'TestController@getTest'
]);

Route::get('/tests/{test_id}/test/', [
  'as' => 'tests.test.prepare',
  'uses' => 'TestController@getPrepareTest'
]);

Route::get('/tests/{test_id}/test/{page_number}', [
  'as' => 'tests.test.start',
  'uses' => 'TestController@getStartTest'
]);

Route::get('/tests/create', [
  'as' => 'tests.create.test',
  'uses' => 'TestController@getCreateTest'
]);
