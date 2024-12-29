<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

// Dashboard Route
Route::get('/dashboard', function () {
    $tasks = Task::where('user_id', Auth::id())->latest()->get();
    return view('dashboard', compact('tasks'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Redirect root to tasks
Route::get('/', function () {
    return redirect('/tasks');
});

// Task Routes (Simplified)
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings and Edit Routes
    Route::get('/profile/settings', [ProfileController::class, 'edit'])->name('profile.settings');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Logout Route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Include additional authentication routes
require __DIR__ . '/auth.php';
