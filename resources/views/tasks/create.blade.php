@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="completed">Completed</label>
                <input type="checkbox" name="completed" id="completed" value="1">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Task</button>
        </form>
    </div>
@endsection
