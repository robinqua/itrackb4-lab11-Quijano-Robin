@extends('layouts.app')

@section('title', $book['title'])

@section('content')
    <h1>{{ $book['title'] }}</h1>
    <ul class="list-group" style="max-width: 24rem;">
        <li class="list-group-item"><strong>ID:</strong> {{ $book['id'] }}</li>
        <li class="list-group-item"><strong>ISBN:</strong> {{ $book['isbn'] }}</li>
        <li class="list-group-item"><strong>Author:</strong> {{ $book['author'] }}</li>
        <li class="list-group-item"><strong>Pages:</strong> {{ $book['pages'] }}</li>
    </ul>

    <div class="mt-3 d-flex gap-2">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">← Back to Book List</a>
        <a href="{{ route('books.edit', $book['id']) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('books.destroy', $book['id']) }}" method="POST" onsubmit="return confirm('Delete this record?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection