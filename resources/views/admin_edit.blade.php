@extends('layouts.app')

@section('content')

	<h1>Editing <b><?php echo $admin['name']; ?></b></h1>
	 {{ Form::open(['action'=> ['HomeController@admin_update',$admin['id']]])}}

	 {{ Form::token() }}
	   {{ Form::label('approve','approve') }}
	   {{ Form::text('approve', $admin['approve']) }}

	   {{ Form::submit('Update') }}

	 {{ Form::close() }}
	

@endsection