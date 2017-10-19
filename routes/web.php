<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('subscriber', 'SubscriberController');
Route::resource('post', 'PostController');

Route::resource('bunch', 'BunchController');
Route::resource('template', 'TemplateController');
Route::resource('compaign', 'CompaignController');
//->where(['id' => '[0-9]+']) undif method?????????
//{bunch}to index crud bunchcontroller
Route::prefix('compaign/{id_compaign}')->group(function () {
	Route::resource('send', 'SendController');
});
Route::prefix('bunch/{id_bunch}')->group(function () {
	Route::resource('subscriber', 'SubscriberController');
});
Route::resource('report', 'ReportController');

// Route::get('send_test_email', function(){
// 	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
// 	{
// 		$message->to('johndoe@gmail.com');
// 	});
// });
