@extends('layouts.app')
@section('content')

@if (!empty($task_info))


<table class="table table-striped table-inverse">
  <thead>
    <tr>
      
     
      <th>Name</th>
      <th>description</th>
      <th>created_at</th>
      <th>updated_at</th>
      <th>dead line</th> 
      <th></th>
    </tr>
  </thead>
  <pre>
    
  </pre>
  <tbody>
    <tr>
    
      
      <td>{{$task_info->task_name}}</td>
      <td>{{$task_info->task_description}}</td>
      <td>{{$task_info->created_at}}</td>
      <td>{{$task_info->updated_at}}</td>
      <td>{{$task_info->finished_at}}</td>

    </tr>
  </tbody>
</table>

@endif

@stop