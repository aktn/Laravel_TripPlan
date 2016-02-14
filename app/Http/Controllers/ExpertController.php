<?php

namespace TripPlan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

class ExpertController extends BaseController
{


    public function getLogIn()
    {
        return view('expertTemplate.login');
    }

    public function postLogIn()
    {
        ParseClient::initialize('LBCfjayh4S3TAtZcPtegICLsuUkxKbUk4kXLZki9', 'AVCndaet1NaH6892druOx95gOG5diRP28SzqwQpX', 'nPnExS3KI0NyGytAbHEiH7rnj8kbhe0EhYQGtUau');
        $email = $request->get('email');
        $pass = $request->get('password');
        $user = ParseUser::logIn($email, $password);
    }

    public function index()
    {
        ParseClient::initialize('LBCfjayh4S3TAtZcPtegICLsuUkxKbUk4kXLZki9', 'AVCndaet1NaH6892druOx95gOG5diRP28SzqwQpX', 'nPnExS3KI0NyGytAbHEiH7rnj8kbhe0EhYQGtUau');
        $query = new ParseQuery("experts");
       try{
            $expert = $query->get("IoKuNw5hiW");
            $email = $expert->get("email");
            $email = $expert->get("name");
            $password = $expert->get("password");
            $expert->fetch();

            return view('expertTemplate.profile')->with('expert',$expert);
       }
       catch(ParseException $ex){

       }
    }


    public function create()
    {
       
        return view('welcome');
    }


    public function store(ListFormRequest $request)
    {
        $list = new Todolist(array(
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ));

        $list->save();

        if(count($request->get('categories'))>0){
            $list->categories()->attach($request->get('categories'));
        }

        return \Redirect::route('lists.create')->with('message','Your list has been created');
    }


    public function show($id)
    {
       
    }


    public function edit($id)
    {
        $list = Todolist::find($id);
        return view('lists.edit')->with('list',$list);
    }


    public function update(ListFormRequest $request, $id)
    {
        $list = Todolist::find($id);

        $list->update([
            'name'  => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return \Redirect::route('lists.edit',array($list->id))->with('message','Your list has been updated!');
    }


    public function destroy($id)
    {
        Todolist::destroy($id);

        return \Redirect::route('lists.index')
            ->with('message','The list have been deleted');
    }
}
