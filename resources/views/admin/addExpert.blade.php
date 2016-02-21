@extends('dashboard')

    @section('sidebar')
        @parent
    @stop


    @section('form-group')
    
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    {!! Form::open(array('files'=>'true','enctype'=>'multipart/form-data','method' => 'post',  'class' => 'form-horizontal'))!!}
        </br></br>

        <div class="form-group">
        	{!! Form::label('name','Expert Name', [ 'class' => 'col-md-3 control-label' ])!!}
        <div class="col-md-9">
            {!! Form::text('name', '', [ 'class' => 'form-control', 'data-stripe' => 'name' ])!!}
            @if ($errors->has('name'))<p class="alert alert-danger">{!!$errors->first('name')!!}</p>@endif
        	</div>
        </div>
        </br>
        
        <div class="form-group">
            {!! Form::label('email','Email', [ 'class' => 'col-md-3 control-label' ])!!}
         <div class="col-md-9">
             {!! Form::text('email', '', [ 'class' => 'form-control', 'data-stripe' => 'email' ])!!}
             @if ($errors->has('email'))<p class="alert alert-danger">{!!$errors->first('email')!!}</p>@endif
             </br>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password','Password', [ 'class' => 'col-md-3 control-label' ])!!}
         <div class="col-md-9">
             {!! Form::password('password', '', [ 'class' => 'form-control', 'data-stripe' => 'password' ])!!}
             @if ($errors->has('password'))<p class="alert alert-danger">{!!$errors->first('password')!!}</p>@endif
             </br>
             
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



