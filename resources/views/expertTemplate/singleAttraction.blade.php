@extends('dashboard')

@section('sidebar')
    @parent
    @stop

    @section('tab')
    @parent
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">Attraction List</a></li>
            <li role="presentation"><a href="">Upload Books</a></li>
        </ul>
    @stop

    @section('session')

	  @if(Session::has('msg'))
	      <div class="alert alert-success">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <h5>Attractions has been addeds!</h5>
	      </div>
	  @endif

	  @if(Session::get('errors'))
	    <div class="alert alert-danger">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	       @foreach($errors->all('<li>:message</li>') as $message)
	          {{$message}}
	       @endforeach
	    </div>
	  @endif
	@stop


    @section('table')
    <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">All Books</div>

      <!-- Table -->
      <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td> ID </td>
            <td> Title </td>
            <td> Type </td>
            <td> Location </td>
            <td> Contact </td>
        </tr>
        </thead>

        

        <tr>
            <td>{{ $attraction->getObjectId() }}</td>
            <td>{{ $attraction->name }}</td>
            <td>{{ $attraction->type }}</td>
            <td>{{ $attraction->location }}</td>
            <td>{{ $attraction->name }}</td>

            <td>
                <a class="btn btn-small btn-danger" href="">Delete</a>
                <a class="btn btn-small btn-info" href=""> Edit </a>
            </td>
        </tr>

       
       
        </table>    
    </div>

    </div>
    @stop

    


