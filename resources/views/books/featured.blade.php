@extends('layouts.app')

@section('title', 'Featured Book')

@section('content')
    <h1>Featured Book</h1>

    <div class="card" style="max-width: 24rem;">
        <div class="card-body">
            <h2 class="card-title">{{ $featured['title'] }}</h2>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item"><strong>ID:</strong> {{ $featured['id'] }}</li>
                <li class="list-group-item"><strong>ISBN:</strong> {{ $featured['isbn'] }}</li>
                <li class="list-group-item"><strong>Author:</strong> {{ $featured['author'] }}</li>
                <li class="list-group-item"><strong>Pages:</strong> {{ $featured['pages'] }}</li>
            </ul>
            <a href="{{ route('books.index') }}" class="btn btn-primary">← Back to Book List</a>
        </div>
    </div>
@endsection