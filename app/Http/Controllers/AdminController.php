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

use TripPlan\Http\Requests\ValidateAddExpert;

class AdminController extends BaseController
{

    public function index()
    {
        $query = new ParseQuery("experts");
       try{
            $expert = $query->get("IoKuNw5hiW");
            $email = $expert->get("email");
            $password = $expert->get("password");
            $expert->fetch();

            return view('expertTemplate.profile')->with('expert',$expert);
       }
       catch(ParseException $ex){

       }
    }


    public function create()
    {
        $query = new ParseQuery("Cities");
        $city = $query->find();
       
        return view('admin.addExpert')->with('city',$city);
    }


    public function store(ValidateAddExpert $request)
    {
        
        $expert = new ParseObject("experts");
        $expert->set("name", $request->get('name'));
        $expert->set("email", $request->get('email'));
        $expert->set("password", bcrypt($request->get('password')));
        
        $cityID = $request->get('city');

        $c = new ParseQuery("Cities");
        $city = $c->get($cityID);

        $expert->set("city",$city);
        $expert->save();

        return \Redirect::route('addExpert')->with('message','Expert has been created');
    }


    public function show($id)
    {
       
    }
}
