@extends('layouts.app')

@section('content')



	<h1>Editing <b><?php echo $user['name']; ?></b></h1>
	 {{ Form::open(['action'=> ['ManagerController@update',$user['id']]])}}

	 {{ Form::token() }}
	   {{ Form::label('approve','approve') }}
	   {{ Form::text('approve', $user['approve']) }}

	   {{ Form::submit('Update') }}

	 {{ Form::close() }}
	

@endsection
