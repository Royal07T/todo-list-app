@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task Details</h1>

        <div class="mb-3">
            <strong>Task Name:</strong> {{ $task->name }}
        </div>

        <div class="mb-3">
            <strong>Status:</strong> {{ $task->completed ? 'Completed' : 'Pending' }}
        </div>

        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
    </div>
@endsection
