@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Task List</h1>

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
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button
                                class="btn btn-danger btn-sm delete-btn"
                                data-task-id="{{ $task->id }}"
                                data-task-title="{{ $task->title }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    // Confirmation dialog for delete buttons
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const taskId = this.dataset.taskId;
            const taskTitle = this.dataset.taskTitle;
            if (confirm(`Are you sure you want to delete the task: "${taskTitle}"?`)) {
                // Create a form dynamically and submit it
                const form = document.createElement('form');
                form.action = `/tasks/${taskId}`;
                form.method = 'POST';

                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = "{{ csrf_token() }}";

                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';

                form.appendChild(csrfInput);
                form.appendChild(methodInput);
                document.body.appendChild(form);

                form.submit();
            }
        });
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

    // Animation for adding a new task
    const addButton = document.querySelector('.btn-primary');
    addButton.addEventListener('click', () => {
        alert('Redirecting to create a new task...');
    });
</script>
@endpush
