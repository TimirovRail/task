<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>
    <form action="/tasks" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter task name" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        {{ $task->completed ? '✔️' : '❌' }}
                    </button>
                </form>
                {{ $task->name }}
            </li>
        @endforeach
    </ul>
</body>
</html>
