@extends('layouts.app')
 
@section('title', 'All Teachers')
 
@section('content')
    <h3>Teacher List</h3>
 
    <table class="table table-bordered table-striped">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Department</th>
        </tr>
 
        @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('teachers.show', $teacher['id']) }}">
                        {{ $teacher['name'] }}
                    </a>
                </td>
                <td>{{ $teacher['department'] }}</td>
            </tr>
        @empty
            <tr><td colspan="3">No teachers found.</td></tr>
        @endforelse
    </table>
@endsection
