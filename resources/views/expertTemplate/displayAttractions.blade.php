@extends('dashboard')

@section('sidebar')
    @parent
    @stop

    @section('tab')
    @parent
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">Attraction List</a></li>
            <li role="presentation"><a href="">Upload Books</a></li>
            <li role="presentation">{{ $currentUser->username }}</li>
        </ul>
    @stop

    @section('session')

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

	  @if(Session::has('message'))
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

        @foreach ($attractions as $attraction)

        <tr>
            <td>{{ $attraction->getObjectId() }}</td>
            <td>{{ $attraction->name }}</td>
            <td>{{ $attraction->type }}</td>
            <td>{{ $attraction->location }}</td>
            <td>{{ $attraction->name }}</td>

            <td>
                <a class="btn btn-small btn-danger" href="{{url('expert/attraction/delete/'.$attraction->getObjectId())}}">Delete</a>
                <a class="btn btn-small btn-info" href="{{url('expert/attraction/edit/'.$attraction->getObjectId())}}"> Edit </a>
                <a class="btn btn-small btn-default" href="{{url('expert/attraction/'.$attraction->getObjectId())}}"> Details </a>
            </td>
        </tr>

        @endforeach
       
        </table>    
    </div>

    </div>
    @stop

    


