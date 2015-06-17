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

$id = '[0-9]+';

// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'CandidatsController@getPaymentStatus',
));


Route::get('/', array('uses' => 'HomeController@showWelcome'));
Route::get('/admin', array('uses' => 'CategoriesController@index'));
Route::group(array('prefix' => '/admin'), function(){
	$id = '[0-9]+';
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/jurys', 'JurysController');
	Route::get('/categories/delete/{id}', 'CategoriesController@getDelete')->where('id', $id);
	Route::get('/jurys/delete/{id}', 'JurysController@getDelete')->where('id', $id);
});
//Users views
Route::controller('users', 'UsersController');
Route::get('register', array('uses' => 'UsersController@getRegister', 'as' => 'register'));
Route::get('register/complete', ['uses' => 'CandidatsController@getCompleteRegistration']);
Route::post('complete-register', ['uses' => 'CandidatsController@storeCompleteRegistration']);
Route::get('register/complete/step2', ['uses' => 'CandidatsController@getCompleteRegistrationStep2']);
Route::post('complete-register/step2', ['uses' => 'CandidatsController@storeCompleteRegistrationStep2']);
Route::get('register/complete/step2', ['uses' => 'CandidatsController@getCompleteRegistrationStep2']);
Route::post('complete-register/step2', ['uses' => 'CandidatsController@storeCompleteRegistrationStep2']);
Route::get('register/complete/step3', ['uses' => 'CandidatsController@getCompleteRegistrationStep3']);
Route::post('complete-register/step3', ['uses' => 'CandidatsController@storeCompleteRegistrationStep3']);
Route::get('register/complete/step4', ['uses' => 'CandidatsController@getCompleteRegistrationStep4']);
Route::post('complete-register/step4', ['uses' => 'CandidatsController@storeCompleteRegistrationStep4']);
Route::get('register/complete/step5',['uses'=>'CandidatsController@getCompleteRegistrationStep5']);
Route::post('complete-register/step5', ['uses'=>'CandidatsController@StoreCompleteRegistrationStep5']);
Route::get('login', array('uses' => 'UsersController@getLogin', 'as' => 'login'));
// Route::get('/admin/categories/', 'CategoriesController@getpdf');
// Route::get('/test', 'PrintController@index');




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
