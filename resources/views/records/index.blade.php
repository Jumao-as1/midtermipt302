@extends('layouts.app')

@section('content')
<h1>Records</h1>

@can('create record')
    <a href="{{ route('records.create') }}" class="btn btn-primary mb-3">Create New Record</a>
@endcan

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Published Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->title }}</td>
            <td>{{ $record->author }}</td>
            <td>{{ $record->published_at }}</td>
            <td>
                @can('edit record')
                    <a href="{{ route('records.edit', $record) }}" class="btn btn-sm btn-warning">Edit</a>
                @endcan
                @can('delete record')
                    <form action="{{ route('records.destroy', $record) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
