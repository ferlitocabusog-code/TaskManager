<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private function rules(): array
    {
        return [
            'task_name'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:Pending,Completed',
            'due_date'    => 'nullable|date',
        ];
    }

    // View Tasks
    public function index()
    {
        $tasks = Task::orderBy('due_date')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show the Add Task form
    public function create()
    {
        return view('tasks.create');
    }

    // Add Task (saves the form data)
    public function store(Request $request)
    {
        Task::create($request->validate($this->rules()));
        return redirect()->route('tasks.index')->with('success', 'Task added!');
    }

    // Show the Edit Task form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Edit Task (saves the changes)
    public function update(Request $request, Task $task)
    {
        $task->update($request->validate($this->rules()));
        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    // Delete Task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    // Update Status: switches between Pending and Completed
    public function updateStatus(Task $task)
    {
        $task->update([
            'status' => $task->status === 'Pending' ? 'Completed' : 'Pending',
        ]);
        return back()->with('success', 'Status updated!');
    }
}