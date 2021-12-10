@extends('layouts.layout')

@section('title', 'Create task')

@section('content')
  <h1>@if (!empty($task)) Edit @else Create @endif task</h1>
  <form action="@if (!empty($task)) {{ route('task.update', ['task' => $task->id]) }} @else {{ route('task.create') }} @endif" method="post" class="mt-3">
    @csrf

    <div class="mb-3">
      <label for="exampleTitle" class="form-label">Title</label>
      <input
          name="title"
          type="text"
          class="form-control @error('title') is-invalid @enderror"
          id="exampleTitle"
          value="{{ old('title', !empty($task) ? $task->title : '') }}"
      >
      @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <textarea
          name="task"
          style="height: 200px"
          class="form-control @error('task') is-invalid @enderror"
          placeholder="Leave a text here"
          id="floatingTextarea">{{ old('task', !empty($task) ? $task->task : '') }}</textarea>
      <label for="floatingTextarea">Task</label>
      @error('task')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <div id="emailHelp" class="form-text">Enter a complete description of the task .</div>
    </div>
    <button type="submit" class="btn btn-primary">@if (!empty($task)) Save @else Create @endif</button>
    <a href="{{ url()->previous() }}" class="btn btn-link">Cancel</a>
  </form>
@endsection