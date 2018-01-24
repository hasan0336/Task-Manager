@extends('layouts.app')
@section('content')
<h1>User assigned tasks are here</h1>

	<table class="table table-striped table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Assign to</th>
      <th>Name</th>
      <th>description</th>
      <th>created_at</th>
      <th>updated_at</th>
      <th>dead line</th> 
      <th>status</th> 
      <th>Rating</th>
    </tr>
  </thead>
  
	<?php $i = 1; ?>
   <tbody>
  @foreach ($tasks as $task)
 
      @if($task->complete == "complete")
    <tr style='background-color: #087b08;color:#fff; '>
      <th scope="row"><?php echo $i; ?></th>
      <td>{{$task->name}}</td>
      <td>{{$task->task_name}}</td>
      <td>{{$task->task_description}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->updated_at}}</td>
      <td>{{$task->finished_at}}</td>
      <td>{{$task->complete}}</td>
       <td>{{$task->rating}}</td>
      <td><a href="{{ url('teamslead/teamlead_view_assign_task/'.$task->id) }}" class="btn btn-default" role="button">view</a></td>
      <td><a href="{{ url('teamslead/teamlead_edit_task/'.$task->id) }}" class="btn btn-default" role="button">Edit</a></td>
     <td><a href="{{ route('teamlead_delete_assigned_task',$task->task_id) }}" class="btn btn-default" role="button">Delete</a></td> 
      </tr>
     @elseif($task->complete == "delyed")

     <tr style='background-color: #bd0606;color:#fff; '>
     <th scope="row"><?php echo $i; ?></th>
      <td>{{$task->name}}</td>
      <td>{{$task->task_name}}</td>
      <td>{{$task->task_description}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->updated_at}}</td>
      <td>{{$task->finished_at}}</td>
      <td>{{$task->complete}}</td>
       <td>{{$task->rating}}</td>
      <td><a href="{{ url('teamslead/teamlead_view_assign_task/'.$task->id) }}" class="btn btn-default" role="button">view</a></td>
      <td><a href="{{ url('teamslead/teamlead_edit_task/'.$task->id) }}" class="btn btn-default" role="button">Edit</a></td>
     <td><a href="{{ route('teamlead_delete_assigned_task',$task->task_id) }}" class="btn btn-default" role="button">Delete</a></td> 	
    </tr>
    @else
    <tr style=''>
        <th scope="row"><?php echo $i; ?></th>
      <td>{{$task->name}}</td>
      <td>{{$task->task_name}}</td>
      <td>{{$task->task_description}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->updated_at}}</td>
      <td>{{$task->finished_at}}</td>
      <td>{{$task->complete}}</td>
       <td>{{$task->rating}}</td>
      <td><a href="{{ url('teamslead/teamlead_view_assign_task/'.$task->id) }}" class="btn btn-default" role="button">view</a></td>
      <td><a href="{{ url('teamslead/teamlead_edit_task/'.$task->id) }}" class="btn btn-default" role="button">Edit</a></td>
     <td><a href="{{ route('teamlead_delete_assigned_task',$task->task_id) }}" class="btn btn-default" role="button">Delete</a></td>  
   </tr>
  </tbody>
  <?php $i++; ?>
  @endforeach
</table>
@stop
