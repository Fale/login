@extends('layouts.default')

@section('title')Documenti @stop

@section('content')
    <div class="row">
        <div class="span9">
    <h2>I tuoi documenti<a class="btn btn-primary pull-right" href="{{URL::route('addDocument')}}">Agiungi uno</a></h2>
    <table class="table">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Numero</th>
                <th>Rilasciata il</th>
                <th>Scadenza</th>
            </tr>
        </thead>
        <tbody>
    @foreach (Document::getAll() as $document)
            @if ($document->verified)
                <tr class="success">
            @elseif ($document->expiry < gmdate('Y-m-d'))
                <tr class="error">
            @else
                <tr>
            @endif
                <td>{{ $document->typeName()}}</td>
                <td>{{ $document->number }}</td>
                <td>{{ Document::data($document->provided,1) }}</td>
                <td>{{ Document::data($document->expiry,1) }}</td>
            </tr>
    @endforeach
        </tbody>
    </table>
        </div>
        @include('account.sidebar')
   </div>
@stop
