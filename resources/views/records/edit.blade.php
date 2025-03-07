@extends('layouts.app')

@section('content')
<h1>Edit Record</h1>
<form action="{{ route('records.update', $record) }}" method="POST" class="mb-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $record->title }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $record->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Author</label>
        <input type="text" name="author" class="form-control" value="{{ $record->author }}" required>
    </div>
    <div class="mb-3">
        <label>Published Date</label>
        <input type="date" name="published_at" class="form-control" value="{{ \Carbon\Carbon::parse($record->published_at)->format('Y-m-d') }}" required>
</div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<a href="{{ route('records.index') }}" class="btn btn-secondary">Back to Records</a>
@endsection
