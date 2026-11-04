@extends('layouts.app')

@section('title', 'My Book List')

@section('content')
    <h1>My Book List</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add a Book</a>

    <section class="mb-4">
        <h2 class="h5">Filter by author</h2>
        <div class="d-flex flex-wrap gap-2 mb-3">
            @foreach ($authorOptions as $authorOption)
                <a href="{{ route('books.index', array_filter(['author' => $authorOption, 'pages' => $pages])) }}"
                   class="btn btn-sm {{ $author === $authorOption ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $authorOption }}
                </a>
            @endforeach
        </div>

        <h2 class="h5">Filter by page count</h2>
        <div class="d-flex flex-wrap gap-2">
            @foreach ($pageOptions as $pageOption)
                <a href="{{ route('books.index', array_filter(['author' => $author, 'pages' => $pageOption])) }}"
                   class="btn btn-sm {{ (string) $pages === (string) $pageOption ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $pageOption }} pages
                </a>
            @endforeach
        </div>

        <p class="mt-3 mb-2">
            <strong>Active filters:</strong>
            @if ($author !== null || $pages !== null)
                @if ($author !== null) Author: {{ $author }}@endif
                @if ($author !== null && $pages !== null) · @endif
                @if ($pages !== null) {{ $pages }} pages @endif
            @else
                None — showing all books
            @endif
        </p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Clear both filters</a>
    </section>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
            <th>Actions</th>
        </tr>

        @forelse ($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book['id'] }}</td>
            <td>
                <a href="{{ route('books.show', $book['id']) }}">
                    {{ $book['isbn'] }}
                </a>
            </td>
            <td>{{ $book['title'] }}</td>
            <td>{{ $book['author'] }}</td>
            <td>
                @if ($book['pages'] >= 300)
                    <strong>{{ $book['pages'] }} (Long Read)</strong>
                @else
                    {{ $book['pages'] }}
                @endif
            </td>
            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('books.edit', $book['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book['id']) }}" method="POST" onsubmit="return confirm('Delete this record?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No books match these filters.</td>
        </tr>
        @endforelse
    </table>

    <p class="mt-3 mb-0">Queries: {{ $queryCount }}</p>
@endsection