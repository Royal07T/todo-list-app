@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Change Password</h1>
        <form action="{{ route('profile.update-password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>
@endsection
