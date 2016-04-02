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
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseClient;
use Illuminate\Routing\Controller as BaseController;
use Parse\ParseSessionStorage;


session_start();
ParseClient::initialize('LBCfjayh4S3TAtZcPtegICLsuUkxKbUk4kXLZki9', 'AVCndaet1NaH6892druOx95gOG5diRP28SzqwQpX', 'nPnExS3KI0NyGytAbHEiH7rnj8kbhe0EhYQGtUau');
ParseClient::setStorage( new ParseSessionStorage() );


Route::get('/', function () {
    return view('welcome');
});

Route::get('/uploadAttractions', function(){
	return view('expertTemplate.addAttractions');
});

Route::get('profile',['as'=>'expert','uses'=>'ExpertController@index']);



Route::get('displayAttractions',['as'=>'displayAttractions','uses'=>'ExpertController@index']);
Route::get('expert/attraction/{id}',['as'=>'attraction','uses'=>'ExpertController@show']);

Route::get('expert/attraction/delete/{id}',['as'=>'delAttraction','uses'=>'ExpertController@destroy']);


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
    
	Route::get('uploadAttractions',['as'=>'uploadAttractions','uses'=>'ExpertController@create']);    
    Route::post('uploadAttractions',['as'=>'expert','uses'=>'ExpertController@store']);

    Route::get('expert/attraction/edit/{id}',['as'=>'editAttraction','uses'=>'ExpertController@edit']);
	Route::post('expert/attraction/edit/{id}',['as'=>'updateAttraction','uses'=>'ExpertController@update']);

    Route::get('addExpert',['as'=>'addExpert','uses'=>'AdminController@create']);
    Route::post('addExpert',['uses'=>'AdminController@store']);

    Route::get('ExpertLogIn',['as'=>'expertLogin','uses'=>'ExpertController@getLogIn']);
	Route::post('ExpertLogIn',['uses'=>'ExpertController@postLogIn']);

    Route::get('adminLogIn',['as'=>'adminLogIn','uses'=>'AdminController@getLogIn']);
    Route::post('adminLogIn',['uses'=>'AdminController@postLogIn']);

    Route::get('admin/viewTripExperts',['as'=>'viewTripExperts','uses'=>'AdminController@getExperts']);
    Route::get('admin/viewAttractions',['as'=>'viewAttractions','uses'=>'AdminController@getAttractions']);
    
});
