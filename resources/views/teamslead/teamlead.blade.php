@extends('layouts.app')
@section('content')
<h1>this is teamlead panel</h1>

	<table class="table table-striped table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Position</th>
      <th>Approve</th>
      <th>Overall Rating</th>
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
      <td></td>
      <td><a href="{{ url('teamslead/teamlead_edit/'.$user->id) }}" class="btn btn-default" role="button">Edit</a></td>
      <td><a href="{{ url('teamslead/assign_task/'.$user->id) }}" class="btn btn-default" role="button">Assign Task</a></td>	
    </tr>
  </tbody>
  <?php $i++; ?>
  @endforeach
</table>

  <h1>Assign task to teamlead</h1>
 <a href="{{ url('teamslead/task_assigned_to_teamlead/'.Auth::user()->id) }}" class="btn btn-default" role="button">Assigned Task</a>
@stop