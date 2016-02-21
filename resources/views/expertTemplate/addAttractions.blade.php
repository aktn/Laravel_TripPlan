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

      {!! Form::open(array('url' => 'uploadAttractions', 'files' => true, 'method' => 'post', 'name' => 'add_attraction', 'class' => 'form-horizontal'))!!}

      <div class="form-group">
          {!! Form::label('name','Name', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::text('name', '', [ 'class' => 'form-control', 'data-stripe' => 'name' ])!!}
           @if ($errors->has('name'))<p class="alert alert-danger">{!!$errors->first('name')!!}</p>@endif
        </div>
      </div>

      <div class="form-group">
          {!! Form::label('type','Type', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::text('type', '', [ 'class' => 'form-control', 'data-stripe' => 'type' ])!!}
           @if ($errors->has('type'))<p class="alert alert-danger">{!!$errors->first('type')!!}</p>@endif
        </div>
      </div>
  
      <div class="form-group">
          {!! Form::label('location','Location', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::text('location', '', [ 'class' => 'form-control', 'data-stripe' => 'location' ])!!}
           @if ($errors->has('location'))<p class="alert alert-danger">{!!$errors->first('location')!!}</p>@endif
        </div>
      </div>

       <div class="form-group">
          {!! Form::label('description','Description', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
           {!! Form::textarea('description', '', [ 'class' => 'form-control', 'data-stripe' => 'description' ])!!}
           @if ($errors->has('description'))<p class="alert alert-danger">{!!$errors->first('description')!!}</p>@endif
        </div>
      </div>

      <div class="form-group">
          {!! Form::label('priority','Priority', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
          {{ Form::select('priority', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4'),'1' ,[ 'class' => 'form-control','data-stripe' => 'category' ])}}
          @if ($errors->has('priority'))<p class="alert alert-danger">{!!$errors->first('priority')!!}</p>@endif
        </div>
      </div>
    
      <div class="form-group">
          {!! Form::label('Image','Image', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
          {!! Form::file('image', null) !!}
          @if ($errors->has('image'))<p class="alert alert-danger">{!!$errors->first('image')!!}</p>@endif
        </div>
      </div>
     
      <div class="form-group">
          {!! Form::label('Audio','Audio', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
          {!! Form::file('media', null) !!}
          @if ($errors->has('media'))<p class="alert alert-danger">{!!$errors->first('media')!!}</p>@endif
        </div>
      </div>
     

      <div class="col-md-offset-3 col-md-9" >
          {!! Form::submit('Upload') !!}
      </div>


    {!! Form::close() !!}

    </div>
    </div>

@stop


