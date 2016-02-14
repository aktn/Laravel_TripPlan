<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uploadAttractions', function(){
	return view('expertTemplate.addAttractions');
});

Route::get('profile',['as'=>'expert','uses'=>'ExpertController@index']);

Route::get('addExpert',['as'=>'admin','uses'=>'AdminController@create']);
Route::post('addExpert',['uses'=>'AdminController@store']);

Route::get('ExpertLogIn',['as'=>'admin','uses'=>'ExpertController@getLogIn']);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
