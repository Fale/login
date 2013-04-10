@extends('layouts.default')

@section('title')Profilo @stop

@section('content')
    <h2>Benvenuto "{{ Auth::user()->email }}"!</h2>
    <!-- <p>Your user ID is: {{ Auth::user()->id }}</p> -->
    <p>Sei stato autenticato. <br>
       Vai alla <a href="http://comitati.fareinrete.org">Home</a>
    </p>
@stop
