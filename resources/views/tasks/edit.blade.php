@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="completed">Completed</label>
            <input type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
            <span>Check this box if the task is completed</span>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>

</div>
@endsection
