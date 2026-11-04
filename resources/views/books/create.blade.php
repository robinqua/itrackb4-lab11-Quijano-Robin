@extends('layouts.app')

@section('title', 'Add a Book')

@section('content')
    <h1>Add a Book</h1>

    <form method="POST" action="{{ route('books.store') }}" class="mb-4" novalidate>
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="number" id="id" name="id" value="{{ old('id', $nextId) }}" class="form-control" readonly>
            @error('id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" class="form-control">
            @error('isbn') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select id="author" name="author" class="form-select">
                <option value="">Choose an author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author }}" @selected(old('author') === $author)>{{ $author }}</option>
                @endforeach
            </select>
            @error('author') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" id="pages" name="pages" value="{{ old('pages') }}" min="1" class="form-control">
            @error('pages') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
