@extends('layouts.app')

@section('content')

<h2>Edit Task</h2>

@if ($errors->any())
    <div class="errors">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Task Name</label>
    <input type="text" name="task_name" value="{{ $task->task_name }}">

    <label>Description</label>
    <textarea name="description">{{ $task->description }}</textarea>

    <label>Due Date</label>
    <input type="date" name="due_date" value="{{ $task->due_date }}">

    <label>Status</label>
    <select name="status">
        <option value="Pending" @if ($task->status == 'Pending') selected @endif>Pending</option>
        <option value="Completed" @if ($task->status == 'Completed') selected @endif>Completed</option>
    </select>

    <button type="submit" class="btn btn-blue">Update Task</button>
</form>

@endsection