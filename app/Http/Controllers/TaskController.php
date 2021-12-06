<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends Controller
{
  //
  public function tasks()
  {
    $tasks = Task::orderBy('created_at')->paginate(10);
    return view('task/list', compact('tasks'));
  }

  public function create(Request $request)
  {
    $validated = $request->validate([
      'title'   => 'required|min:4|max:100',
      'task'    => 'required|min:20',
    ]);

    $task = new Task();
    $task->id = Str::uuid();
    $task->owner_uuid = Auth::id();
    $task->title = $request->input('title');
    $task->task = $request->input('task');

    $task->save();
    return redirect()->route('task.list');
  }
}
