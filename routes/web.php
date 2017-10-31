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
//!!!!!!!!!!!!!!!!!!!!!!!1 na blog not_admin\ctag_user i not_admin\articl_user add routs
Route::get('/', function () {
	
	// return view('welcome', [
 //          'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
 //        ]);

 return View::make('welcome')
        ->with('articles', Article::all())->paginate(10);
    //return view('welcome');
});


Auth::routes();

/**
* AdminPanel page route
*/
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => ['auth']], function (){
/**
* Admin_Main page route
*/	
	Route::get('/', 'AdminController@admin')->name('admin.index');

/**
* WITH RESOURCE
*/
	//Route::resource('/category', 'CategoryController', ['as'=>'admin', 'uses' => 'CategoryController@index']);
	Route::resource('/category', 'CategoryController', ['as'=>'admin']);
	Route::resource('/article', 'ArticleController', ['as'=>'admin']);
	Route::get('logout', function()
{
    Auth::logout();
     
    return Redirect::home();
});

});
//['web']],function()
Route::group(['middleware' => ['auth']], function (){
/**
* NOT RESOURCE//NEED helperS a href{{url('/report/unsubscribe')}}
*/
/**
* Main page route before registration
*/
//Route::resource('infoSaver', 'InfoSaverController');//->name('welcome');

Route::resource('category', 'CategoryController');//, ['as'=>'user']); /cat
Route::resource('articles', 'ArticleController');//, ['as'=>'user']); /art// 'ArticleController@index');
/**
* Main page route after registration
*/
//Route::get('/', 'ArticleController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
/**
* Custom controllers
*/
//Route::get('users/{userId}/articles, ArticleUserController@index')->name('articles.index');//na adm i user

Route::prefix('user/{user}')->group(function () {
	Route::get('articles', 'ArticleUserController@index')->name('articles.index_user');
});

//Route::get('/compaign/{compaign}/preview', 'CompaignController@preview')->name('compaign.preview');//helper a href="{{ url('/compaign/preview') }}"
 Route::prefix('compaign/{compaign}')->group(function () {
 	Route::get('preview', 'CompaignController@preview')->name('compaign.preview');
 });
//Route::prefix('compaign/{compaign}')->group(function () {
	//Route::resource('preview', 'PreviewController');
//});
//Route::post('/compaign/{compaign}/send', 'CompaignController@send');//->name('compaign.report');

Route::prefix('compaign/{compaign}')->group(function () {
	Route::post('send', 'CompaignController@send')->name('compaign.index');
});

//Route::get('/report/{report}/unsubscribe', 'CompaignController@unsubscribe')->name('compaign.unsubscribe');//helper a href{{url('/report/unsubscribe')}}
// Route::prefix('report/{report}')->group(function () {
// 	Route::resource('unsubscribe', 'CompaignReport@unsubscribe');
// });
//Route::post('comments/post_id', 'CompaignController@comments_store')->name('compaign.comments_store');// i post_id in argument of comments_store

/**
* WITH RESOURCE
*/
Route::resource('compaign', 'CompaignController');
Route::resource('bunch', 'BunchController');
Route::resource('template', 'TemplateController');
//->where(['id' => '[0-9]+']) undif method?????????
//Route::post('subscribers/{bunch_id}', ['uses' = 'SubscriberController', 'as = '['subscribers.store']);//->name('compaign.report');//create edit
Route::prefix('bunch/{bunch}')->group(function () {
	Route::resource('subscriber', 'SubscriberController');
});
//
Route::resource('report', 'ReportController');


Route::get('logout', function()
{
    Auth::logout();
     
    return Redirect::home();
});

});



/////////////////////////////////////////////////////////trash
//Route::resource('post', 'PostController');



// Route::get('send_test_email', function(){
// 	Mail::object('send', function($message)
// 	{
// 		$message->to('johndoe@gmail.com');
		//$message->from(implode(array_('johndoe@gmail.com');
// 	});
// });
// Route::get('/', function()
// {
//     return View::make('articles.index')
//         ->with('articles', Article::all());
// });