@extends('layouts.app')

@section('content')

<h1>this is admin panel</h1>

	<table class="table table-striped table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Position</th>
      <th>Approve</th>
      <th></th>
    </tr>
  </thead>
  
	<?php $i = 1; ?>
  @foreach ($users as $user)
 
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->position}}</td>
      <td>{{$user->approve}}</td>
      <td><a href="{{ url('admin_edit/'.$user->id) }}" class="btn btn-default" role="button">Edit</a></td>
      	
    </tr>
  </tbody>
  <?php $i++; ?>
  @endforeach
</table>


   {{ Form::open(array('action'=>'LoginController@getSignOut')) }}
    {{ Form::token() }}
    {{ Form::submit('logout') }}
    {{ Form::close() }}
@endsection
