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
    <div id="box" style="margin-top:50px" class="mainbox mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

    <div class="panel panel-info">

      <div class="panel-heading">
          <div class="panel-title">Upload Categories</div>

          

      </div>  

      <div class="panel-body" > 


  
      
      {!! Form::open() !!}


      <div class="form-group">
          {!! Form::label('email','Email', [ 'class' => 'col-md-3 control-label' ])!!}
       <div class="col-md-9">
           {!! Form::text('email', '', [ 'class' => 'form-control', 'data-stripe' => 'email' ])!!}
          </div>
      </div>
      </br></br></br>

      <div class="form-group">
          {!! Form::label('password','Password', [ 'class' => 'col-md-3 control-label' ])!!}
       <div class="col-md-9">
           {!! Form::text('password', '', [ 'class' => 'form-control', 'data-stripe' => 'password' ])!!}
          </div>
      </div>
      </br></br></br>


      <div class="col-md-offset-3 col-md-9" >
          {!! Form::submit('Add') !!}
      </div>

    {!! Form::close() !!}

    </div>
    </div>

@stop


