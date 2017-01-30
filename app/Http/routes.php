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
  'uses' => 'Auth\AuthController@showLoginForm',
]);
Route::post('/login', [
  'as' => 'auth.login',
  'uses' => 'Auth\AuthController@login',
]);
Route::get('/logout', [
  'as' => 'auth.logout',
  'uses' => 'Auth\AuthController@logout',
]);

// Registration Routes...
Route::get('/register', [
  'as' => 'auth.register',
  'uses' => 'Auth\AuthController@showRegistrationForm',
]);
Route::post('/register', [
  'as' => 'auth.register',
  'uses' => 'Auth\AuthController@register',
]);

// Password Reset Routes...
Route::get('/password/reset/{token?}', [
  'as' => 'auth.password.reset',
  'uses' => 'Auth\PasswordController@showResetForm',
]);
Route::post('/password/email', [
  'as' => 'auth.password.email',
  'uses' => 'Auth\PasswordController@sendResetLinkEmail',
]);
Route::post('/password/reset', [
  'as' => 'auth.password.reset',
  'uses' => 'Auth\PasswordController@reset',
]);


//  Tests
Route::get('/tests', [
  'as' => 'tests',
  'uses' => 'TestController@getAllTests',
]);

Route::get('/tests/create', [
  'as' => 'tests.create.test',
  'uses' => 'TestController@getCreateTest',
  'middleware' => 'auth',
]);

Route::get('/tests/{test_id}', [
  'as' => 'tests.test',
  'uses' => 'TestController@getTest',
]);

Route::get('/tests/{test_id}/test', [
  'as' => 'tests.test.prepare',
  'uses' => 'TestController@getPrepareTest',
]);

Route::get('/tests/{test_id}/test/review', [
  'as' => 'tests.test.review',
  'uses' => 'TestController@getTestReview',
]);

Route::get('/tests/{test_id}/test/result', [
  'as' => 'tests.test.result',
  'uses' => 'TestController@getTestResult',
]);

Route::get('/tests/{test_id}/test/{page_number}', [
  'as' => 'tests.test.start',
  'uses' => 'TestController@getStartTest',
]);

Route::get('/tests/search/user/{username}', [
  'as' => 'tests.search.user',
  'uses' => 'TestController@getUserTests',
]);

Route::post('/test/submit_answer', [
  'as' => 'storeTestAnswer',
  'uses' => 'TestController@postStoreAnswer',
]);

Route::get('/test/get_answers', [
  'as' => 'getTestAnswer',
  'uses' => 'TestController@getStoreAnswer',
]);

// Users

Route::get('/user/{username}', [
  'as' => 'getUser',
  'uses' => 'UserController@getUser',
  ]);

Route::get('/user/{username}/edit', [
  'as' => 'getEditUser',
  'uses' => 'UserController@getEditUser',
  ]);
Route::get('/user/{username}/edit/privacy_settings', [
  'as' => 'getEditUserPrivacy',
  'uses' => 'UserController@getEditUserPrivacy',
  ]);
Route::get('/user/{username}/edit/contact_settings', [
  'as' => 'getEditUserContact',
  'uses' => 'UserController@getEditUserContact',
  ]);
Route::get('/user/{username}/edit/change_password', [
  'as' => 'getEditUserPassword',
  'uses' => 'UserController@getEditUserPassword',
  ]);
Route::post('/user/edit/profile', [
  'as' => 'postEditUser',
  'uses' => 'UserController@postEditUser',
]);
Route::post('/user/edit/privacy', [
  'as' => 'postEditUserPrivacy',
  'uses' => 'UserController@postEditUserPrivacy',
]);
