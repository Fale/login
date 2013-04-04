@extends('layouts.default')

@section('title')Registrati @stop

@section('content')
    <h2>Registrati</h2>
    @foreach ($errors->all() as $message)
        <div class="alert alert-error">{{ $message }}</div>
    @endforeach
    {{ Form::open(array('url' => 'register', 'method' => 'POST', 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('nome', 'Nome', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('nome', Input::old('nome')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('cognome', 'Cognome', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('cognome', Input::old('cognome')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('citta', 'Città', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('citta', Input::old('citta')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('provincia', 'Provincia', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('provincia', Input::old('provincia')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('email', 'Indirizzo e-mail', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('email', Input::old('email')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('telefono', 'Telefono', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('telefono', Input::old('telefono')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('cf', 'Codice Fiscale', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('cf', Input::old('cf')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('password') }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('password_confirmation', 'Ripeti Password', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('password_confirmation') }}</div>
        </div>
        <div class="control-group">
            <div class="controls">{{ Form::submit('Registrati', array('class' => 'button')) }}</div>
        </div>
    {{ Form::close() }}
@stop
