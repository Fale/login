@extends('layouts.scaffold')

@section('main')

<h1>Show Document</h1>

<p>{{ link_to_route('documents.index', 'Return to all documents') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>User_id</th>
				<th>Type</th>
				<th>Number</th>
				<th>Provider</th>
				<th>Verified</th>
				<th>Hidden</th>
				<th>Provided</th>
				<th>Expiry</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $document->user_id }}</td>
					<td>{{ $document->type }}</td>
					<td>{{ $document->number }}</td>
					<td>{{ $document->provider }}</td>
					<td>{{ $document->verified }}</td>
					<td>{{ $document->hidden }}</td>
					<td>{{ $document->provided }}</td>
					<td>{{ $document->expiry }}</td>
                    <td>{{ link_to_route('documents.edit', 'Edit', array($document->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('documents.destroy', $document->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop