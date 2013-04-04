@extends('layouts.default')

@section('title')Aggiungi documento @stop

@section('content')
    <h2>Aggiungi documento</h2>
    {{ Form::open(array('url' => 'profile/document', 'method' => 'POST', 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('type', 'Tipo documento', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('type', Input::old('type')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('number', 'Numero', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('number', Input::old('number')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('provider', 'Ente rilasciante', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('provider', Input::old('provider')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('provided', 'Data di rilascio', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('provided', Input::old('provided')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('expiry', 'Data di scadenza', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('expiry', Input::old('expiry')) }}</div>
        </div>
        <div class="control-group">
            <div class="controls">{{ Form::submit('Aggiungi documento', array('class' => 'button')) }}</div>
        </div>
    {{ Form::close() }}
@stop
