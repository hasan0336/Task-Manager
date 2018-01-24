@extends('layouts.app')
@section('content')
<h1>Manager assigned tasks are here at this</h1>

	<table class="table table-striped table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>task id</th>
      <th>Assign to</th>
      <th>Name</th>
      <th>description</th>
      <th>created_at</th>
      <th>updated_at</th>
      <th>dead line</th>
      <th>Finish Time</th> 
      <th>Priority</th>
      <th>Status</th>
      <th>Rating</th>
      <th></th>
    </tr>
  </thead>
  
	<?php $i = 1; ?>
<tbody>
  @foreach ($tasks as $task)
 
  
    @if($task->complete == "complete")
    <tr style='background-color: #087b08;color:#fff; '>
      <th scope="row" ><?php echo $i; ?></th>
      <td>{{$task->task_id}}</td>
      <td>{{$task->name}}</td>
      <td>{{$task->task_name}}</td>
      <td>{{$task->task_description}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->updated_at}}</td>
      <td>{{$task->finished_at}}</td>
      <td>{{$task->task_finished_at}}</td>
      <td>{{$task->priority}}</td>
      <td>{{$task->complete}}</td>
     <td></td>
      


      <td><a href="{{ url('manager/manager_view_assign_task/'.$task->task_id) }}" class="btn btn-default" role="button">view</a></td>
      <td><a href="{{ url('manager/manager_edit_task/'.$task->task_id) }}" class="btn btn-default" role="button">Edit</a></td>
      <td><a href="{{ route('delete_assigned_task',$task->task_id) }}" class="btn btn-default" role="button">Delete</a></td>  
    @elseif($task->complete == "delyed")

     <tr style='background-color: #bd0606;color:#fff; '>
      <th scope="row"><?php echo $i; ?></th>
      <td>{{$task->task_id}}</td>
      <td>{{$task->name}}</td>
      <td>{{$task->task_name}}</td>
      <td>{{$task->task_description}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->updated_at}}</td>
      <td>{{$task->finished_at}}</td>
      <td>{{$task->task_finished_at}}</td>
      <td>{{$task->priority}}</td>
      <td>{{$task->complete}}</td>
     <td></td>
      


      <td><a href="{{ url('manager/manager_view_assign_task/'.$task->task_id) }}" class="btn btn-default" role="button">view</a></td>
      <td><a href="{{ url('manager/manager_edit_task/'.$task->task_id) }}" class="btn btn-default" role="button">Edit</a></td>
      <td><a href="{{ route('delete_assigned_task',$task->task_id) }}" class="btn btn-default" role="button">Delete</a></td>   
    </tr>
    @else
      <tr style=''>
      <th scope="row"><?php echo $i; ?></th>
      <td>{{$task->task_id}}</td>
      <td>{{$task->name}}</td>
      <td>{{$task->task_name}}</td>
      <td>{{$task->task_description}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->updated_at}}</td>
      <td>{{$task->finished_at}}</td>
      <td>{{$task->task_finished_at}}</td>
      <td>{{$task->priority}}</td>
      <td>{{$task->complete}}</td>
     <td></td>
      


      <td><a href="{{ url('manager/manager_view_assign_task/'.$task->task_id) }}" class="btn btn-default" role="button">view</a></td>
      <td><a href="{{ url('manager/manager_edit_task/'.$task->task_id) }}" class="btn btn-default" role="button">Edit</a></td>
      <td><a href="{{ route('delete_assigned_task',$task->task_id) }}" class="btn btn-default" role="button">Delete</a></td>     
    </tr>
    @endif
  <?php $i++; ?>
  @endforeach
  </tbody>
</table>
@stop

