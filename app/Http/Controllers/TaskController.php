<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View Tasks - get all tasks and show them
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    // show the form for adding a task
    public function create()
    {
        return view('tasks.create');
    }

    // Add Task - save the new task to the database
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'status' => 'required',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task added!');
    }

    // show the form for editing a task
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', ['task' => $task]);
    }

    // Edit Task - save the changes
    public function update(Request $request, $id)
    {
        $request->validate([
            'task_name' => 'required',
            'status' => 'required',
        ]);

        $task = Task::find($id);
        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    // Delete Task
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    // Update Status - switch between Pending and Completed
    public function updateStatus($id)
    {
        $task = Task::find($id);

        if ($task->status == 'Pending') {
            $task->status = 'Completed';
        } else {
            $task->status = 'Pending';
        }

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Status updated!');
    }
}