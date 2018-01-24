@extends('layouts.app')

@section('content')

{{dd($user['id'])}}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="{{ action('ManagerController@assign_task',$user['id']) }}">
                	 {{ Form::token() }}
                    <fieldset>
                       
                        <legend class="text-center header">Assigning Task to <strong>{{ $user->name }}</strong> 
                            <span style="color:red">({{$overall_rating}})</span> </legend>

                         <input id="user_id" name="user_id" type="hidden"  value="{{ $user['id'] }}">

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square" aria-hidden="true"></i></i></span>
                            <div class="col-md-8">
                                <input id="task_name" name="task_name" type="text" placeholder="Task Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="user_name" name="user_name" type="text
                                " value="{{ $user->name }}" placeholder="User Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="user_email" name="user_email" type="text" value="{{ $user->email }}" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                            <div class="col-md-8">
                                <input id="sender_position" name="sender_position" type="text" value="{{ $user->position }}" placeholder="Position" class="form-control">
                            </div>
                        </div>

                        <div class="radio">
                            <b>Priority</b>
                          <label><input type="radio" name="priority" value="High">High</label>
                          <label><input type="radio" name="priority" value="Medium">Medium</label>
                          <label><input type="radio" name="priority" value="Low">Low</label>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="task_description" name="task_description" placeholder="Enter your task description here" rows="7"></textarea>
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
                                 <a href="{{ url('manager/assigned_task/'.$user->id) }}" class="btn btn-default" role="button">Assigned Task </a>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
	

@endsection