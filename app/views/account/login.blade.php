@extends('layouts.default')

@section('title')Accedi @stop

@section('content')
    @if (Session::has('flash_error'))
        <div class="alert alert-error">{{ Session::get('flash_error') }}</div>
    @endif
    <h2>Collegati</h2>
        <div class="span6">
            {{ Form::open(array('url' => 'login', 'method' => 'POST', 'class' => 'form-horizontal')) }}
                <div class="control-group">
                    {{ Form::label('email', 'Indirizzo e-mail', array('class' => 'control-label')) }}
                    <div class="controls">{{ Form::text('email', Input::old('email')) }}</div>
                </div>
                <div class="control-group">
                    {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                    <div class="controls">{{ Form::password('password') }}</div>
                    </div>
                <div class="control-group">
                    <div class="controls">{{ Form::submit('Accedi', array('class' => 'button')) }}</div>
                </div>
            {{ Form::close() }}
        </div>
        <div class="span5">
            <p><a href="remindpassword">Hai dimenticato la password  ? Clicca qui</a></p>
            <input name="Submit2" type="button" class="button" value="VOGLIO REGISTRARMI AL SITO" onClick="self.location='register';">
        </div>
@stop
