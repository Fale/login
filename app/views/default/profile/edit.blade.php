@extends(t('template'))

@section('title')Profilo @stop

@section('content')
    <div class="row">
        <div class="span9">
            <h2>Modifica profilo</h2>
            <div class="control-group">
                {{ Form::label('name', 'Nome', array('class' => 'control-label')) }}
                <div class="controls">{{ Form::text('name') }}</div>
            </div>
        </div>
        @include(t('profile.sidebar'))
    </div>
@stop
