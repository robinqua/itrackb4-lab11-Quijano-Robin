@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <h1>Edit Book</h1>

    <form action="{{ route('books.update', $book['id']) }}" method="POST" class="mb-4" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="number" id="id" name="id" value="{{ old('id', $book['id']) }}" class="form-control" readonly>
            @error('id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $book['isbn']) }}" class="form-control">
            @error('isbn') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book['title']) }}" class="form-control">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select id="author" name="author" class="form-select">
                <option value="">Choose an author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author }}" @selected(old('author', $book['author']) === $author)>{{ $author }}</option>
                @endforeach
            </select>
            @error('author') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" id="pages" name="pages" value="{{ old('pages', $book['pages']) }}" min="1" class="form-control">
            @error('pages') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
