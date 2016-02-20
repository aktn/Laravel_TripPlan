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
use TripPlan\Http\Requests\ValidateUploadAttraction;

class ExpertController extends BaseController
{


    public function getLogIn()
    {
        return view('expertTemplate.login');
    }

    public function postLogIn()
    {
        
        $email = $request->get('email');
        $pass = $request->get('password');
        $user = ParseUser::logIn($email, $password);
    }

    public function index()
    {
        $query = new ParseQuery("attractions");
       try{
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


    public function store(ValidateUploadAttraction $request)
    {
        $attraction = new ParseObject("attractions");
        $attraction->set("name", $request->get('name'));
        $attraction->set("type", $request->get('type'));
        $attraction->set("location", $request->get('location'));
        $attraction->set("description", $request->get('description'));

        $file = $request->file('image');
       // $localFilePath = "/public/images/attractions/Palace.jpg";
        $f = ParseFile::createFromData(file_get_contents( $_FILES['image']['tmp_name'] ), $_FILES['image']['name']  );
        $f->save();

        $audio = $request->file('media');
        $m = ParseFile::createFromData(file_get_contents( $_FILES['media']['tmp_name'] ), $_FILES['media']['name']  );
        $m->save();


        $attraction->set("image",$f);
        $attraction->set("media",$m);

        $a = $request->get('priority');
        $int = (int)$a;
        $attraction->set("priority", $int);

        $expID = 'wJacAzyx3T';
        $exp = '7YuChBta6I';

        $query = new ParseQuery("experts");
        $expertID = $query->get($expID);

        $query1 = new ParseQuery("Cities");
        $expert = $query1->get($exp);
       

        $attraction->set("expert",$expertID);
        $attraction->set("city_attractions",$expert);
        $attraction->save();




        return \Redirect::route('uploadAttractions')->with('message','Your list has been created');
    }


    public function show($id)
    {      
    }


    public function edit($id)
    {
    }


    public function update(ListFormRequest $request, $id)
    {        
    }


    public function destroy($id)
    {  
    }
}
