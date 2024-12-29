@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Task Details</h1>

    <div id="taskCard" class="shadow-lg card">
        <div class="text-white card-header bg-primary">
            <h3 class="mb-0" id="taskTitle">{{ $task->title }}</h3>
        </div>
        <div class="card-body">
            <p id="taskDescription" class="lead">{{ $task->description }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="mt-4 btn btn-secondary" id="backButton">Back</a>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const taskCard = document.getElementById('taskCard');
        const taskTitle = document.getElementById('taskTitle');
        const taskDescription = document.getElementById('taskDescription');
        const backButton = document.getElementById('backButton');

        // Apply a fade-in animation on page load
        taskCard.style.opacity = '0';
        taskCard.style.transition = 'opacity 1s ease-in-out';
        setTimeout(() => {
            taskCard.style.opacity = '1';
        }, 200);

        // Add hover effect on the back button
        backButton.addEventListener('mouseenter', () => {
            backButton.style.backgroundColor = '#0d6efd';
            backButton.style.color = '#fff';
        });

        backButton.addEventListener('mouseleave', () => {
            backButton.style.backgroundColor = '';
            backButton.style.color = '';
        });

        // Make the task title animate slightly when hovered
        taskTitle.addEventListener('mouseenter', () => {
            taskTitle.style.transform = 'scale(1.05)';
            taskTitle.style.transition = 'transform 0.3s ease';
        });

        taskTitle.addEventListener('mouseleave', () => {
            taskTitle.style.transform = 'scale(1)';
        });

        // Add a slight zoom effect on the task description on hover
        taskDescription.addEventListener('mouseenter', () => {
            taskDescription.style.transform = 'translateY(-5px)';
            taskDescription.style.transition = 'transform 0.3s ease';
        });

        taskDescription.addEventListener('mouseleave', () => {
            taskDescription.style.transform = 'translateY(0)';
        });
    });
</script>
@endpush
