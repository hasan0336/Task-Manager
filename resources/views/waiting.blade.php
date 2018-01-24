<h1>Wait until manager accepts your request</h1>
{{ Form::open(array('action'=>'LoginController@getSignOut')) }}
    {{ Form::token() }}
    {{ Form::submit('logout') }}
    {{ Form::close() }}