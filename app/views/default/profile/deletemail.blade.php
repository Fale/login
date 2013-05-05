@extends(t('template'))

@section('title')Elimina l'utente @stop

@section('content')
    @if (Session::has('flash_error'))
        <div class="alert alert-error">{{ Session::get('flash_error') }}</div>
    @endif
    <h2>Elimina l'utente</h2>
    {{ Form::open(array('route' => 'profile.deletemail', 'method' => 'POST', 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('email', 'Indirizzo e-mail', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('email', Input::old('email')) }}</div>
        </div>
        <div class="control-group">
            <div class="controls">{{ Form::submit('Procedi', array('class' => 'button')) }}</div>
        </div>
    {{ Form::close() }}
@stop
