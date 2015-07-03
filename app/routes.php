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

Route::get('/export/{id}', ['uses' => 'PrintController@htmlToPdf'])->where('id', $id);

Route::get('/', array('uses' => 'HomeController@showWelcome'));
Route::get('/admin', array('uses' => 'CategoriesController@index'));

Route::group(array('prefix' => '/admin'), function(){
	$id = '[0-9]+';
	Route::resource('/categories', 'CategoriesController', ['except' => ['show']]);
	Route::get('/categories/delete/{id}', 'CategoriesController@getDelete')->where('id', $id);
	Route::resource('/jurys', 'JurysController', ['except' => ['show']]);
	Route::get('/jurys/delete/{id}', 'JurysController@getDelete')->where('id', $id);
	Route::resource('/candidates', 'ManageCandidatesController', ['except' => ['create', 'store']]);
	Route::get('/candidates/delete/{id}', 'ManageCandidatesController@getDelete')->where('id', $id);
	Route::get('/candidates/remove-participation/{id}/{categoryId}', 'ManageCandidatesController@removeCategoryFromCandidate')->where('id', $id)->where('categoryId', $id);
	Route::get('/candidates/add-participation/{id}/{categoryId}', 'ManageCandidatesController@addCategoryToCandidate')->where('id', $id)->where('categoryId', $id);
	Route::get('/candidates/delete/{id}', 'ManageCandidatesController@getDelete')->where('id', $id);
	Route::get('/candidates/download/file/{id}', 'ManageCandidatesController@getDownload')->where('id', $id);
});

//Candidates views
Route::controller('users', 'UsersController');
Route::get('register', array('uses' => 'UsersController@getRegister', 'as' => 'register'));

Route::get('register/complete', ['uses' => 'CandidatsController@getCompleteRegistration']);
Route::post('complete-register', ['uses' => 'CandidatsController@storeCompleteRegistration']);

Route::get('basic', function() {
    return View::make('upload.basic');
});


Route::post('api/basic', ['uses' => 'CandidatsController@uploadFile']); 

Route::controller('password', 'RemindersController');
Route::get('register/edit-complete', 'CandidatsController@editCompleteRegistration');
Route::patch('edit/complete-register','CandidatsController@updateCompleteRegistration');

Route::get('register/complete/step2', ['uses' => 'CandidatsController@getCompleteRegistrationStep2']);
Route::post('complete-register/step2', ['uses' => 'CandidatsController@storeCompleteRegistrationStep2']);

Route::get('register/edit-complete/step2/', 'CandidatsController@editCompleteRegistrationStep2');
// Route::patch('edit/complete-register/step2','CandidatsController@updateCompleteRegistrationStep2');
Route::get('edit/complete-register/step2/remove-participation/{categoryId}', 'CandidatsController@removeCategoryFromEnterprise')->where('categoryId', $id);
Route::get('edit/complete-register/step2/add-participation/{categoryId}', 'CandidatsController@addCategoryToEnterprise')->where('categoryId', $id);

Route::get('register/complete/step3', ['uses' => 'CandidatsController@getCompleteRegistrationStep3']);
Route::post('complete-register/step3', ['uses' => 'CandidatsController@storeCompleteRegistrationStep3']);

Route::get('register/edit-complete/step3', 'CandidatsController@editCompleteRegistrationStep3');
Route::get('edit/delete-file/step3/{id}','CandidatsController@getDeleteFile')->where('id', $id);
Route::patch('edit/complete-register/step3','CandidatsController@updateCompleteRegistrationStep3');

Route::get('register/complete/step4', ['uses' => 'CandidatsController@getCompleteRegistrationStep4']);
Route::post('complete-register/step4', ['uses' => 'CandidatsController@storeCompleteRegistrationStep4']);

Route::get('register/edit-complete/step4', 'CandidatsController@editCompleteRegistrationStep4');
Route::patch('edit/complete-register/step4','CandidatsController@updateCompleteRegistrationStep4');

Route::get('register/complete/step5',['uses'=>'CandidatsController@getCompleteRegistrationStep5']);
Route::post('complete-register/step5/paypal', ['uses'=>'CandidatsController@StoreCompleteRegistrationStep5']);
Route::post('complete-register/step5/check', ['uses' => 'CandidatsController@storeCompleteRegistrationStep5_check']);


Route::get('register/complete/final', ['uses' => 'CandidatsController@getCompleteRegistrationFinal']);
Route::get('login', array('uses' => 'UsersController@getLogin', 'as' => 'login'));
