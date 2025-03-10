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
        <label>Genre</label>
        <input type="text" name="genre" class="form-control" value="{{ $record->genre }}" required>
    </div>
    <div class="mb-3">
        <label>Release Year</label>
        <input type="number" name="release_year" class="form-control" value="{{ $record->release_year }}" required>
    </div>
    <div class="mb-3">
        <label>Developer</label>
        <input type="text" name="developer" class="form-control" value="{{ $record->developer }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $record->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<a href="{{ route('records.index') }}" class="btn btn-secondary">Back to Records</a>
@endsection
