<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Apply authentication middleware to all methods in this controller.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a list of tasks for the authenticated user.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id())
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->get();


        return view('tasks.index', compact('tasks'));
    }


    /**
     * Show the form to create a new task.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in the database for the authenticated user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable|boolean', // Validate that it's either null or a boolean
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'completed' => $request->has('completed') ? 1 : 0, // Set completed to 1 if checked, otherwise 0
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }




    /**
     * Display the details of a specific task.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form to edit an existing task.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update an existing task in the database for the authenticated user.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable|boolean',
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'completed' => $request->has('completed') ? 1 : 0, // Update completed status based on checkbox
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }


    /**
     * Remove a task from the database for the authenticated user.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
