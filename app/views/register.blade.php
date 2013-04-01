@extends('layouts.default')

@section('title')Login @stop

@section('content')
    <h2>Registrati</h2>
    {{ Form::open(array('url' => 'register', 'method' => 'POST')) }}
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
        <p>{{ Form::submit('Registrati', array('class' => 'button')) }}</p>
    {{ Form::close() }}
@stop
