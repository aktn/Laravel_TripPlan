@extends('dashboard')

@section('sidebar')
    @parent
    @stop

    @section('tab')
    @parent
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">Attraction List</a></li>
            <li role="presentation"><a href="">Upload Books</a></li>
            <li role="presentation">{{ $currentUser->email }}</li>
        </ul>
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
            <td> email </td>
            <td> username </td>
            <td> Created Date </td>
        </tr>
        </thead>

        @foreach ($tripExperts as $tripExpert)

        <tr>
            <td>{{ $tripExpert->getObjectId() }}</td>
            <td>{{ $tripExpert->email }}</td>
            <td>{{ $tripExpert->username }}</td>
            <td>{{ $tripExpert->createdAt }}</td>


            <td>
                
            </td>
        </tr>

        @endforeach 

       
        </table>    
    </div>

    </div>
    @stop

    


