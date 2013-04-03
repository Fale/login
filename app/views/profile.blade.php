@extends('layouts.default')

@section('title')Profilo @stop

@section('content')
    <h2>Welcome "{{ Auth::user()->email }}" to the protected page!</h2>
    <p>Your user ID is: {{ Auth::user()->id }}</p>
@stop
