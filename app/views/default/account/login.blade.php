@extends(t('template'))

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
                <div class="controls"><p><small><a href="remindpassword">Password dimenticata?</a></small></p></div>
                <div class="control-group">
                    <div class="controls">{{ Form::submit('Accedi', array('class' => 'button')) }}</div>
                </div>
            {{ Form::close() }}
        </div>
        <div class="span5" style="margin-top: 40px">
            <input name="Submit2" style="float:right" type="button" class="button" value="VOGLIO REGISTRARMI AL SITO" onClick="self.location='register';">
        </div>
@stop
