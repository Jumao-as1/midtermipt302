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
        <label>Genre</label>
        <input type="text" name="genre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Release Year</label>
        <input type="number" name="release_year" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Developer</label>
        <input type="text" name="developer" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
<a href="{{ route('records.index') }}" class="btn btn-secondary">Back to Records</a>
@endsection
