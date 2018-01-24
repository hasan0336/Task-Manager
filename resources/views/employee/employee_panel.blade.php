@extends('layouts.app')
@section('content')
<h1>task assigned to teamlead</h1>


<table class="table table-striped table-inverse">
  <thead>
    <tr>
      <th>#</th>
     
      <th>Name</th>
      <th>description</th>
      <th>created_at</th>
      <th>updated_at</th>
      <th>dead line</th> 
      <th>Priority</th>
      <th>assigned from</th> 
      <th>complete at</th>
      <th>status</th>
    </tr>
  </thead>
  <pre>

  </pre>
  
  
	<?php $i = 1; ?>
  @foreach ($tasks as $task)
 
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      
      <td>{{$task->task_name}}</td>
      <td>{{$task->task_description}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->updated_at}}</td>
      <td>{{$task->finished_at}}</td>
      <td>{{$task->priority}}</td>
      <td>{{$task->name}}</td>
      <td>{{$task->task_finished_at}}</td>
      <td>{{$task->complete}}</td>


      <td><a href="{{ url('employee/view_assigned_task/'.$task->id) }}" class="btn btn-default" role="button">view</a></td>
      @if($task->task_finished_at == null)
        <td><form action="{{route('employee_finish_task',['Taskid'=> $task->id])}}" method="POST">
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <input class="btn btn-default" type="submit" name="finish" id="finish" value="finish" onclick="this.form.submit();this.disabled=true;">
      </form>
      </td>
      @else
        <td>
        <input class="btn btn-default" type="submit" name="finish" id="finish" value="finish" disabled="">
      </td>
      @endif
      </tr>
  </tbody>
  <?php $i++; ?>
  @endforeach
</table>
@stop
