@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Task Details</h1>

    <div class="card">
        <div class="card-header">
            <strong>{{ $task->title }}</strong>
        </div>
        <div class="card-body">
            <p>{{ $task->description }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="mt-4 btn btn-secondary">Back</a>
</div>
@endsection
