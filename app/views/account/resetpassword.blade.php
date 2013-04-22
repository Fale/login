@extends('layouts.default')

@section('title')Reimposta la tua password @stop

@section('content')
    @if (Session::has('error'))
        <div class="alert alert-error">{{ Session::get('error') }}</div>
    @endif
    <h2>Reimposta la tua password</h2>
    {{ Form::open(array('url' => 'resetpassword', 'method' => 'POST', 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('email', 'Indirizzo e-mail', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('email') }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::password('password') }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('password_confirmation', 'Ripeti la password', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::password('password_confirmation') }}</div>
        </div>
        <div class="control-group">
            <div class="controls">{{ Form::submit('Nuova password', array('class' => 'button')) }}</div>
        </div>
        {{ Form::hidden('token', $token) }}
    {{ Form::close() }}
@stop
