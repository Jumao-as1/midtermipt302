@extends('layouts.app')

@section('content')
<h1>Create Record</h1>
<form action="{{ route('records.store') }}" method="POST" class="mb-4">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Author</label>
        <input type="text" name="author" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Published Date</label>
        <input type="date" name="published_at" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
<a href="{{ route('records.index') }}" class="btn btn-secondary">Back to Records</a>
@endsection
