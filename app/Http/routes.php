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

ParseClient::initialize('LBCfjayh4S3TAtZcPtegICLsuUkxKbUk4kXLZki9', 'AVCndaet1NaH6892druOx95gOG5diRP28SzqwQpX', 'nPnExS3KI0NyGytAbHEiH7rnj8kbhe0EhYQGtUau');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/uploadAttractions', function(){
	return view('expertTemplate.addAttractions');
});

Route::get('profile',['as'=>'expert','uses'=>'ExpertController@index']);

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
    
	Route::get('uploadAttractions',['as'=>'uploadAttractions','uses'=>'ExpertController@create']);    
    Route::post('uploadAttractions',['as'=>'expert','uses'=>'ExpertController@store']);

    Route::get('addExpert',['as'=>'addExpert','uses'=>'AdminController@create']);
    Route::post('addExpert',['uses'=>'AdminController@store']);
});
