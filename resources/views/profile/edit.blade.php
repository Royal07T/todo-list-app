@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Profile Settings</h1>

    <!-- Profile Information Update Form -->
    <form action="{{ route('profile.update') }}" method="POST" id="updateProfileForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            <small id="nameHelp" class="form-text text-muted">Enter your full name as it appears on official documents.</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            <small id="emailHelp" class="form-text text-muted">Make sure to enter a valid email address.</small>
        </div>
        <button type="submit" class="btn btn-primary btn-block" id="updateProfileButton">Update Profile</button>
    </form>
</div>

<div class="container mt-5">
    <h1 class="my-4 text-center">Change Password</h1>

    <!-- Password Change Form -->
    <form action="{{ route('profile.update-password') }}" method="POST" id="changePasswordForm">
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
        <button type="submit" class="btn btn-primary btn-block" id="changePasswordButton">Change Password</button>
    </form>
</div>

<!-- Delete Account Section -->
<div class="container mt-5">
    <h1 class="my-4 text-center text-danger">Delete Account</h1>
    <form action="{{ route('profile.destroy') }}" method="POST" id="deleteAccountForm">
        @csrf
        @method('DELETE')
        <p class="text-danger">Are you sure you want to permanently delete your account? This action cannot be undone.</p>
        <button type="submit" class="btn btn-danger btn-block" id="deleteAccountButton">Delete Account</button>
    </form>
</div>

@endsection

@push('scripts')
<script>
    // Profile form button hover effect
    const updateProfileButton = document.getElementById('updateProfileButton');
    updateProfileButton.addEventListener('mouseenter', () => {
        updateProfileButton.style.backgroundColor = '#0056b3'; // Darker blue on hover
        updateProfileButton.style.transform = 'scale(1.05)';
    });
    updateProfileButton.addEventListener('mouseleave', () => {
        updateProfileButton.style.backgroundColor = '#007bff';
        updateProfileButton.style.transform = 'scale(1)';
    });

    // Password change form button hover effect
    const changePasswordButton = document.getElementById('changePasswordButton');
    changePasswordButton.addEventListener('mouseenter', () => {
        changePasswordButton.style.backgroundColor = '#0056b3'; // Darker blue on hover
        changePasswordButton.style.transform = 'scale(1.05)';
    });
    changePasswordButton.addEventListener('mouseleave', () => {
        changePasswordButton.style.backgroundColor = '#007bff';
        changePasswordButton.style.transform = 'scale(1)';
    });

    // Delete account button hover effect
    const deleteAccountButton = document.getElementById('deleteAccountButton');
    deleteAccountButton.addEventListener('mouseenter', () => {
        deleteAccountButton.style.backgroundColor = '#c82333'; // Darker red on hover
        deleteAccountButton.style.transform = 'scale(1.05)';
    });
    deleteAccountButton.addEventListener('mouseleave', () => {
        deleteAccountButton.style.backgroundColor = '#dc3545';
        deleteAccountButton.style.transform = 'scale(1)';
    });

    // Confirm account deletion
    const deleteAccountForm = document.getElementById('deleteAccountForm');
    deleteAccountForm.addEventListener('submit', (e) => {
        const confirmation = confirm("Are you sure you want to delete your account? This action cannot be undone.");
        if (!confirmation) {
            e.preventDefault();
        }
    });
</script>
@endpush
