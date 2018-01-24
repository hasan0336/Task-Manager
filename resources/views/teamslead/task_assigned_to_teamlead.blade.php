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
      <th>priority</th> 
      <th>assigned from</th> 
      <th>complete at</th>
      <th>status</th>
    </tr>
  </thead>
  <pre>

  </pre>
  
  
	<?php $i = 1; ?>
  @foreach ($login_tasks as $login_task)
 
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      
      <td>{{$login_task->task_name}}</td>
      <td>{{$login_task->task_description}}</td>
      <td>{{$login_task->created_at}}</td>
      <td>{{$login_task->updated_at}}</td>
      <td>{{$login_task->finished_at}}</td>
      <td>{{$login_task->priority}}</td>
      <td>{{$login_task->name}}</td>
      <td>{{$login_task->task_finished_at}}</td>
      <td>{{$login_task->complete}}</td>


      <td><a href="{{ url('teamslead/teamlead_view_task/'.$login_task->id) }}" class="btn btn-default" role="button">view</a></td>
      @if($login_task->task_finished_at == null)
        <td><form action="{{route('teamlead_finish_task',['Taskid'=> $login_task->id])}}" method="POST">
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

