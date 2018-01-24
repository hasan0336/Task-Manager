@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                 @if($task['complete'] == null)
                <form class="form-horizontal" method="post" action="{{ action('TaskController@manager_update_task',$task['id']) }}">
                	 {{ Form::token() }}
                    <fieldset>
                        <legend class="text-center header">Assigning Task</legend>

                         <input id="user_id" name="user_id" type="hidden"  value="{{ $task['id'] }}">

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square" aria-hidden="true"></i></i></span>
                            <div class="col-md-8">
                                <input id="task_name" name="task_name" type="text" value="{{ $task['task_name'] }}" placeholder="Task Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="task_description" name="task_description">{{ $task['task_description'] }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <div class='input-group date col-md-8' id='datetimepicker1'>
                    <input type='text' class="form-control" name="finished_at" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

                        <div class="form-group">


                            <div class="col-md-12 text-center">	
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>

                        </div>
                    </fieldset>
                </form>

                @elseif ($task['complete'] != null)

                 <form class="form-horizontal" method="post" action="{{ action('TaskController@teamlead_update_task',$task['id']) }}">
                     {{ Form::token() }}
                    <fieldset>
                        <legend class="text-center header">Assigning Task</legend>

                         <input id="user_id" name="user_id" type="hidden"  value="{{ $task['id'] }}">

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square" aria-hidden="true"></i></i></span>
                            <div class="col-md-8">
                                <input id="task_name" name="task_name" type="text" value="{{ $task['task_name'] }}" placeholder="Task Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="task_description" name="task_description">{{ $task['task_description'] }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                        <div class="col-md-8">
                            <b>Rating</b>
                          <label><input type="radio" name="rate" value="1">1</label>
                          <label><input type="radio" name="rate" value="2">2</label>
                          <label><input type="radio" name="rate" value="3">3</label>
                          <label><input type="radio" name="rate" value="4">4</label>
                          <label><input type="radio" name="rate" value="5">5</label>
                        </div>
                        </div>



                        <div class="form-group">


                            <div class="col-md-12 text-center"> 
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>

                        </div>
                    </fieldset>
                </form>
@endif
                
            </div>
        </div>
    </div>
</div>
	

@endsection