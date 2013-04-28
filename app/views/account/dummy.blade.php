@extends('layouts.default')

@section('title')Profilo @stop

@section('content')
    <?php $user = UserInfo::find(Auth::user()->id); ?>
    <div class="row">
        <div class="span9">
            <h2>Benvenuto {{$user->name}} {{$user->surname}}!</h2>
            <p>Grazie per esserti iscritto e ti invitiamo a guardare la tua mail per confermarla.</p>
        </div>
    </div>
@stop
