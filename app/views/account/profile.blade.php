@extends('layouts.' . Config::get('template'))

@section('title')Profilo @stop

@section('content')
    <?php $user = UserInfo::find(Auth::user()->id); ?>
    <div class="row">
        <div class="span9">
            <h2>Benvenuto {{$user->name}} {{$user->surname}}!</h2>
        </div>
        @include('account.sidebar')
    </div>
@stop
