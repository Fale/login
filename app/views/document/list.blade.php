@extends('layouts.default')

@section('title')Documenti @stop

@section('content')
    <h2>I tuoi documenti</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
    @foreach (Document::getAll() as $document)
            @if ($document->verified)
                <tr class="success">
            @else
                <tr>
            @endif
                <td>{{ $document->id }}</td>
                <td>{{ $document->type}}</td>
            </tr>
    @endforeach
        </tbody>
    </table>
@stop
