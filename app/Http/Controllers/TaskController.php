<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends Controller
{
  /**
   * Получение всех задач относящихся к авторизованному пользователю
   * https://laravel.com/docs/8.x/eloquent-relationships#querying-belongs-to-relationships
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function tasks()
  {
    $user = Auth::user();
    if (!empty($user) && $user->isManager()) {
      $tasks = Task::orderBy('created_at')->paginate(10);
    } else {
      $tasks = Task::where('owner_id', $user->id)->orderBy('created_at')->paginate(10);
    }

    return view('task/list', compact('tasks'));
  }

  /**
   * Добавление задачи
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function create(Request $request)
  {
    $validated = $request->validate([
      'title'   => 'required|min:4|max:100',
      'task'    => 'required|min:20',
    ]);

    $task = new Task();
    $task->id = Str::uuid();
    $task->owner_id = Auth::id();
    $task->title = $request->input('title');
    $task->task = $request->input('task');

    $task->save();
    return redirect()->route('task.list');
  }

  public function view(Task $task)
  {
    $this->authorize('view', $task);
    return view('task/view', compact('task'));
  }
}
