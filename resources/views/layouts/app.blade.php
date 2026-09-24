<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <div class="navbar">
        <a href="{{ route('tasks.index') }}">Task Manager</a>
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>

    <div class="container">
        {{-- success message --}}
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        {{-- the content of each page goes here --}}
        @yield('content')
    </div>

</body>
</html>