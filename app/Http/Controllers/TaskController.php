<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::orderBy('created_at', 'asc')->get();
 
    return view('tasks', [
        'tasks' => $tasks
    ]);
}

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
 
    if ($validator->fails()) {
        return redirect('/tasks')
            ->withInput()
            ->withErrors($validator);
    }
 
    $task = new Task;
    $task->name = $request->name;
    $task->created_at = now(); //sets time to real-time
    $task->save();
 
    return redirect('/tasks');
}


public function destroy(Task $task)
{
    $task->delete();
 
    return redirect('/');
}

}