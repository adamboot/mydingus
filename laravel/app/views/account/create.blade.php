@extends('template')

@section('title')
Account Page
@stop

@section('content')

{{ Form::open(array('action' => 'AccountController@store', 'id' => 'sign_up_form'))}}

{{ Form::label('first_name', 'First Name') }}
{{ Form::text('first_name') }}
<span class="text-error">{{ $errors->first('first_name') }}</span>

{{ Form::label('last_name', 'Last Name') }}
{{ Form::text('last_name') }}
<span class="text-error">{{ $errors->first('last_name') }}</span>

{{ Form::label('email', 'email') }}
{{ Form::email('email') }}
<span class="text-error">{{ $errors->first('email') }}</span>

{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}
<span class="text-error">{{ $errors->first('password') }}</span>

{{ Form::label('password_confirm', 'Confirm Password') }}
{{ Form::password('password_confirm') }}
<span class="text-error">{{ $errors->first('password_confirm') }}</span>

{{ Form::label('') }}

{{ Form::submit('Submit', array('class' => 'btn')) }}

{{ Form::close() }}

@stop