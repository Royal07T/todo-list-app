@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Create New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" id="createTaskForm">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Enter task title" autofocus>

        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Provide task details"></textarea>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="completed" id="completed" value="1">
            <label class="form-check-label" for="completed">Completed</label>
            <span class="form-check-label">Check this box if the task is completed.</span>
        </div>
        <button type="submit" class="btn btn-primary btn-block" id="createTaskButton">Create Task</button>
    </form>

</div>
@endsection

@push('scripts')
<script>
    // Enhance focus behavior for the title input
    const titleInput = document.getElementById('title');
    titleInput.addEventListener('focus', () => {
        titleInput.style.borderColor = '#007bff'; // Blue border on focus
    });
    titleInput.addEventListener('blur', () => {
        titleInput.style.borderColor = ''; // Remove border color when unfocused
    });

    // Task creation button animation on hover
    const createButton = document.getElementById('createTaskButton');
    createButton.addEventListener('mouseenter', () => {
        createButton.style.backgroundColor = '#0056b3'; // Darker blue on hover
        createButton.style.transform = 'scale(1.05)';
    });
    createButton.addEventListener('mouseleave', () => {
        createButton.style.backgroundColor = '#007bff'; // Reset to original color
        createButton.style.transform = 'scale(1)';
    });

    // Form validation on submit
    const form = document.getElementById('createTaskForm');
    form.addEventListener('submit', (e) => {
        const title = titleInput.value.trim();
        if (title.length < 5) {
            e.preventDefault(); // Prevent form submission
            alert("Title must be at least 5 characters long.");
            titleInput.focus();
        }
    });
</script>
@endpush
