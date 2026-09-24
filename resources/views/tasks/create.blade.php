@extends('layouts.app')

@section('content')

<h2>Add Task</h2>

{{-- show errors if the form is not filled in correctly --}}
@if ($errors->any())
    <div class="errors">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <label>Task Name</label>
    <input type="text" name="task_name" value="{{ old('task_name') }}">

    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>

    <label>Due Date</label>
    <input type="date" name="due_date" value="{{ old('due_date') }}">

    <label>Status</label>
    <select name="status">
        <option value="Pending">Pending</option>
        <option value="Completed">Completed</option>
    </select>

    <button type="submit" class="btn btn-blue">Save Task</button>
</form>

@endsection