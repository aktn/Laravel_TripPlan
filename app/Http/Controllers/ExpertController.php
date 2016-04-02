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
use TripPlan\Http\Requests\ValidateLoginExpert;


class ExpertController extends BaseController
{
    public function getLogIn()
    {
        return view('expertTemplate.login');
    }

    public function postLogIn(ValidateLoginExpert $request)
    {
        
        $email = $request->get('email');
        $pass = $request->get('password');
        
        $user = ParseUser::logIn($email, $pass);

        $query = new ParseQuery("attractions");
        $currentUser = ParseUser::getCurrentUser();
        try{
            $attractions = $query->find();
            return view('expertTemplate.displayAttractions')->with('attractions',$attractions)
                                                            ->with('currentUser',$currentUser);
        }
        catch(ParseException $ex){
        }
    }

    public function index()
    {
        $query = new ParseQuery("attractions");
        try{
            $attractions = $query->find();
            return view('expertTemplate.displayAttractions')->with('attractions',$attractions);
        }
        catch(ParseException $ex){

        }
    }


    public function create()
    {
       
        return view('expertTemplate.addAttractions');
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

        return \Redirect::route('uploadAttractions')->with('message','Attraction has been created');
    }


    public function show($id)
    {      
        $query = new ParseQuery("attractions");
        try{
            $attraction = $query->get($id);
            return view('expertTemplate.singleAttraction')->with('attraction',$attraction);
        }
        catch(ParseException $ex){

        }
    }


    public function edit($id)
    {
        $query = new ParseQuery("attractions");
        try{
            $attraction = $query->get($id);
            return view('expertTemplate.editAttraction')->with('attraction',$attraction);
        }
        catch(ParseException $ex){

        }
    }

    public function update(ValidateUploadAttraction $request, $id)
    {
        $query = new ParseQuery("attractions");
        try{

        $attraction = $query->get($id);
      //  $attraction = $query->equalTo("objectId",$id);
      //  $attraction = $query->first();
        $attraction->set("name", $request->get('name'));
        $attraction->set("type", $request->get('type'));
        $attraction->set("location", $request->get('location'));
        $attraction->set("description", $request->get('description'));

       
        $attraction->save();

        return \Redirect::route('uploadAttractions')->with('message','Attraction has been created');        
        }
        catch(ParseException $ex){
            
        }

    }


    public function destroy($id)
    {  
        $query = new ParseQuery("attractions");
        try{
            $query->equalTo("objectId",$id);
            $attraction = $query->first();
            $attraction->destroy();
            return \Redirect::route('displayAttractions')->with('message','Attraction has been deleted');
        }
        catch(ParseException $ex){
            
        }    
    }
}
