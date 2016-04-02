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
use TripPlan\Http\Requests\ValidateLoginAdmin;



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

    public function getLogIn()
    {
        return view('admin.adminLogin');
    }

    public function postLogIn(ValidateLoginAdmin $request)
    {
        $email = $request->get('email');
        $pass = $request->get('password');
        
        $user = ParseUser::logIn($email, $pass);

        $query = new ParseQuery("attractions");
        $currentUser = ParseUser::getCurrentUser();
        try{
            $attractions = $query->find();
            return view('admin.viewExperts')->with('attractions',$attractions)
                                            ->with('currentUser',$currentUser);
        }
        catch(ParseException $ex){

        }
    }

    public function getExperts()
    {
        $q = ParseUser::query();
        $q->equalTo("role","tripexpert");
        $currentUser = ParseUser::getCurrentUser();
        if ($currentUser){
            $tripExperts = $q->find();
            return view('admin.viewExperts')->with('tripExperts',$tripExperts)
                                             ->with('currentUser',$currentUser);
        }
        else{
             return view('admin.viewExperts');
        }  
    }

    public function getAttractions()
    {
        $city = new ParseQuery("Cities");
        $city->equalTo("city_name","NewYork");

        $query = new ParseQuery("attractions");
        $query->matchesQuery("city_attractions",$city);

        $currentUser = ParseUser::getCurrentUser();
        if ($currentUser){
            $attractions = $query->find();
            return view('expertTemplate.displayAttractions')->with('attractions',$attractions)
                                                            ->with('currentUser',$currentUser);
        }
        else{
             
        }
    }

}
