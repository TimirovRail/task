<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('completed') -> orderBy('name') -> get();
        return view('tasks.index', compact('tasks'));
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255',
        ]);
        Task::create([
            'name' => $request->name,
        ]);
        return redirect('/');
    }
    public function update(Task $task)
    {
        $task->update([
            'completed' => !$task->completed,
        ]);
        return redirect('/');
    }
}
