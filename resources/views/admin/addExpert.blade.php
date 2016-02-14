@extends('dashboard')

    @section('sidebar')
        @parent
    @stop


     @section('form-group')
    
    {!! Form::open(array('files'=>'true','enctype'=>'multipart/form-data')) !!}

        <div class="form-group">
        	{!! Form::label('name','Expert Name', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
            {!! Form::text('name', '', [ 'class' => 'form-control', 'data-stripe' => 'name' ])!!}
        	</div>
        </div>
        </br></br></br>
        
        <div class="form-group">
            {!! Form::label('email','Email', [ 'class' => 'col-md-3 control-label' ])!!}
         <div class="col-md-9">
             {!! Form::text('email', '', [ 'class' => 'form-control', 'data-stripe' => 'email' ])!!}
             </br></br>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password','Password', [ 'class' => 'col-md-3 control-label' ])!!}
         <div class="col-md-9">
             {!! Form::text('password', '', [ 'class' => 'form-control', 'data-stripe' => 'password' ])!!}
             </br></br>
             
            </div>
        </div>

        <div class="form-group">
            {{ Form::label( 'city', 'City', [ 'class' => 'col-md-3 control-label' ])}}
            <div class="col-md-9">
            {{ Form::select('city',  array('5GeVEg9TJC' => 'New York', '7YuChBta6I' => 'London'), '7YuChBta6I', [ 'class' => 'form-control', 'data-stripe' => 'city' ]) }}
            </br>
            {!! Form::submit('Add Expert') !!}
            </div>

        </div>

        </br></br></br>

    {!! Form::close() !!}


@stop



