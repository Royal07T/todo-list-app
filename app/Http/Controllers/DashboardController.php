<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch tasks for the authenticated user
        $tasks = Task::where('user_id', Auth::id())->latest()->get();

        // Pass tasks to the view
        return view('dashboard', compact('tasks'));
    }
}
