@extends('layouts.default')

@section('title')Login @stop

@section('content')
    @if (Session::has('flash_error'))
        <div class="alert alert-error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('url' => 'login', 'method' => 'POST')) }}
        <!-- username field -->
        <p>
            {{ Form::label('email', 'Indirizzo e-mail') }}<br/>
            {{ Form::text('email', Input::old('email')) }}
        </p>
        <!-- password field -->
        <p>
            {{ Form::label('password', 'Password') }}<br/>
            {{ Form::password('password') }}
        </p>
        <!-- submit button -->
        <p>{{ Form::submit('Accedi', array('class' => 'button')) }}</p>
    {{ Form::close() }}
    <p><a href="lostpwd">Hai dimenticato la password  ? Clicca qui</a></p>
    <input name="Submit2" type="button" class="button" value="VOGLIO REGISTRARMI AL SITO" onClick="self.location='register';">
@stop
