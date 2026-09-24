@extends('layouts.app')

@section('content')

<h2>My Tasks</h2>

<table>
    <tr>
        <th>Task Name</th>
        <th>Description</th>
        <th>Due Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->task_name }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->due_date }}</td>
        <td>{{ $task->status }}</td>
        <td>
            {{-- Update Status button --}}
            <form action="{{ route('tasks.status', $task->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-green">
                    @if ($task->status == 'Pending')
                        Mark Completed
                    @else
                        Mark Pending
                    @endif
                </button>
            </form>

            {{-- Edit button --}}
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-orange">Edit</a>

            {{-- Delete button --}}
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-red">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@if ($tasks->count() == 0)
    <p>No tasks yet.</p>
@endif

@endsection