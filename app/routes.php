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


Route::get('/', array('uses' => 'HomeController@showWelcome'));
Route::get('/admin/category', array('uses' => 'AdminController@ShowCategory'));

//Users views
Route::controller('users', 'UsersController');
Route::get('register', array('uses' => 'UsersController@getRegister', 'as' => 'register'));
Route::get('login', array('uses' => 'UsersController@getLogin', 'as' => 'login'));
//Upload Views
// Route::get('upload', array('uses' => 'UploadsController@index', 'as' => 'upload'));
// Route::post('upload', 'UploadsController@upload');
// Route::get('myuploads', array('before' => 'auth', function()
// {
//     $userid = Auth::user()->id;
//     $upload = Upload::where('user_id', '=', $userid)->orderBy('id', 'DESC')->paginate(5);
//     return View::make('upload.myupload')->with('upload', $upload);
// }));
// Route::get('cloud', array('before' => 'auth', function()
// {
//     $userid = Auth::user()->id;
//     $upload = Upload::where('status', '=', '1')->orderBy('id', 'DESC')->paginate(5);
//     return View::make('upload.cloud')->with('upload', $upload);
// }));
