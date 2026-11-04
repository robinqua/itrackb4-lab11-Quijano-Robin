@extends('layouts.app')
 
@section('title', $teacher['name'])
 
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $teacher['name'] }}</h3>
            <p>Department: {{ $teacher['department'] }}</p>
            <p>Subject: {{ $teacher['subject'] }}</p>
 
            <a class="btn btn-primary"
               href="{{ route('teachers.index') }}">Back to the list</a>
        </div>
    </div>
@endsection
