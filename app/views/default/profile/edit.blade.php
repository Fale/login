@extends(t('template'))

@section('title')Profilo @stop

@section('content')
    <div class="row">
        <div class="span9">
            <h2>Modifica profilo</h2>
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
            <div class="controls">{{ Form::text('provincia', Input::old('provincia'), array('maxlength' => '2')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('email', 'Indirizzo e-mail', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('email', Input::old('email')) }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('telefono', 'Telefono', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('telefono', Input::old('telefono')) }}(opzionale)</div>
        </div>
        <div class="control-group">
            {{ Form::label('cf', 'Codice Fiscale', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::text('cf', Input::old('cf')) }}(opzionale)</div>
        </div>
        <div class="control-group">
            {{ Form::label('tesserato', 'Sei già tesserato/a?', array('class' => 'control-label')) }}
            <div class="controls">
                {{ Form::radio('tesserato', '1', Input::get('tesserato'), array('class' => 'inline', 'style' => 'margin-left: 45px'))}} Yes
                {{ Form::radio('tesserato', '0', Input::get('tesserato'), array('class' => 'inline', 'style' => 'margin-left: 50px'))}} No
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('comitato', 'Comitato', array('class' => 'control-label')) }}
            <div class="controls">
                {{ Form::select('comitato', Group::getArray(array('0' => "Nessuna preferenza")), Input::old('comitato')) }}
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::password('password') }}</div>
        </div>
        <div class="control-group">
            {{ Form::label('password_confirmation', 'Ripeti Password', array('class' => 'control-label')) }}
            <div class="controls">{{ Form::password('password_confirmation') }}</div>
        </div>
        <div class="control-group">
            <div class="controls">{{ Form::submit('Salva', array('class' => 'button')) }}</div>
        </div>
        @include(t('profile.sidebar'))
    </div>
@stop
