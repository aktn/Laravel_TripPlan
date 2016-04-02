@extends('dashboard')

@section('sidebar')
    @parent
    @stop

    @section('tab')
    @parent
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">Cateogry Section</a></li>
          
    @stop
    

    @section('form-group') 

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
       
    <div id="box" style="margin-top:50px" class="mainbox mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

    <div class="panel panel-info">

      <div class="panel-heading">
        <div class="panel-title">Upload Destination</div>
      </div>  

      <div class="panel-body" > 

      {!! Form::open(array( 'files' => true, 'method' => 'post', 'class' => 'form-horizontal'))!!}

      <div class="form-group">
          {!! Form::label('name','Name', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::text('name', $attraction->name, [ 'class' => 'form-control', 'data-stripe' => 'name' ])!!}
           
        </div>
      </div>

      <div class="form-group">
          {!! Form::label('type','Type', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::text('type', $attraction->type, [ 'class' => 'form-control', 'data-stripe' => 'type' ])!!}
          
        </div>
      </div>
  
      <div class="form-group">
          {!! Form::label('location','Location', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::text('location', $attraction->location, [ 'class' => 'form-control', 'data-stripe' => 'location' ])!!}
        </div>
      </div>

       <div class="form-group">
          {!! Form::label('description','Description', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::textarea('description', $attraction->description, [ 'class' => 'form-control', 'data-stripe' => 'description' ])!!}
        </div>
      </div>

      <div class="form-group">
          {!! Form::label('priority','Priority', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
          {{ Form::select('priority', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4'),'1' ,[ 'class' => 'form-control','data-stripe' => 'category' ])}}
      </div>

      </br></br>
      <div class="col-md-offset-3 col-md-9" >
          {!! Form::submit('Edit') !!}
      </div>


    {!! Form::close() !!}

    </div>
    </div>

@stop


