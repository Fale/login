@extends('layouts.default')

@section('title')Remind Password @stop

@section('content')
    @if (Session::has('flash_error'))
        <div class="alert alert-error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('url' => 'remindpassword', 'method' => 'POST')) }}
        <p>
            {{ Form::label('email', 'Indirizzo e-mail') }}<br/>
            {{ Form::text('email', Input::old('email')) }}
        <p>{{ Form::submit('Nuova password', array('class' => 'button')) }}</p>
    {{ Form::close() }}
@stop
