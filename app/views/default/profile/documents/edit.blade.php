@extends('layouts.scaffold')

@section('main')

<h1>Edit Document</h1>
{{ Form::model($document, array('method' => 'PATCH', 'route' => array('documents.update', $document->id))) }}
    <ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::input('number', 'type') }}
        </li>

        <li>
            {{ Form::label('number', 'Number:') }}
            {{ Form::text('number') }}
        </li>

        <li>
            {{ Form::label('provider', 'Provider:') }}
            {{ Form::text('provider') }}
        </li>

        <li>
            {{ Form::label('verified', 'Verified:') }}
            {{ Form::text('verified') }}
        </li>

        <li>
            {{ Form::label('hidden', 'Hidden:') }}
            {{ Form::text('hidden') }}
        </li>

        <li>
            {{ Form::label('provided', 'Provided:') }}
            {{ Form::text('provided') }}
        </li>

        <li>
            {{ Form::label('expiry', 'Expiry:') }}
            {{ Form::text('expiry') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('documents.show', 'Cancel', $document->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop