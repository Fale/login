@extends('layouts.default')

@section('title')Login @stop

@section('content')
    <h2>I tuoi documenti</h2>
    @foreach (Document::where('user_id', Auth::user()->id)->get() as $document)
        Document {{ $document->id }}.
    @endforeach
@stop
