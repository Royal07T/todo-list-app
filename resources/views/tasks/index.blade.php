<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>To-Do List</h1>

        <!-- Button to add a new task -->
        <a href="{{ route('tasks.create') }}" class="mb-3 btn btn-primary">Add New Task</a>

        <!-- Table to display tasks -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if($task->completed)
                                <span class="badge bg-success">Completed</span> <!-- Green for Completed -->
                            @else
                                <span class="badge bg-warning">Pending</span> <!-- Yellow for Pending -->
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
