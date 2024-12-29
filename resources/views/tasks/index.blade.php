@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Task List</h1>

        <!-- Flash message -->
        @if (session('success'))
            <div id="flashMessage" class="text-center alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Button to add a new task -->
        <a href="{{ route('tasks.create') }}" class="mb-3 btn btn-primary">Add New Task</a>

        <!-- Table to display tasks -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskTableBody">
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if($task->completed)
                                <span class="badge bg-success task-status">Completed</span>
                            @else
                                <span class="badge bg-warning task-status">Pending</span>
                            @endif
                        </td>
                        <td>
                            <!-- View button -->
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>

                            <!-- Edit button -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    // Hide flash message after 2 seconds
    document.addEventListener('DOMContentLoaded', () => {
        const flashMessage = document.getElementById('flashMessage');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.display = 'none';
            }, 2000);
        }
    });

    // Smooth hover effects
    const rows = document.querySelectorAll('#taskTableBody tr');
    rows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.backgroundColor = '#f8f9fa';
        });
        row.addEventListener('mouseleave', () => {
            row.style.backgroundColor = '';
        });
    });
</script>
@endpush
