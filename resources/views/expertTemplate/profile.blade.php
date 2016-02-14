@extends('dashboard')

@section('form-group')

    <h3>Email : {{ $expert->email }}</h3>
    <p>
    	Name: {{ $expert->name }}</br>
        Password: {{ $expert->password }}
    </p>

    
@endsection