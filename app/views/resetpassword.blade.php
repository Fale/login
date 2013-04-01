@extends('layouts.default')

@section('title')Remind Password @stop

@section('content')
    @if (Session::has('error'))
        <div class="alert alert-error">{{ Session::get('error') }}</div>
    @endif
    {{ Form::open(array('url' => 'resetpassword', 'method' => 'POST')) }}
        <p>
            {{ Form::text('token', $token) }}
            {{ Form::label('email', 'Indirizzo e-mail') }}<br/>
            {{ Form::text('email') }}
            {{ Form::text('password') }}
            {{ Form::text('password_confirmation') }}
        <p>{{ Form::submit('Nuova password', array('class' => 'button')) }}</p>
    {{ Form::close() }}
@stop
