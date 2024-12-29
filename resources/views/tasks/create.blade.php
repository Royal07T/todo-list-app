@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Create New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="completed">Completed</label>
            <input type="checkbox" name="completed" id="completed" value="1">
            <span>Check this box if the task is completed</span>
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>

</div>
@endsection
