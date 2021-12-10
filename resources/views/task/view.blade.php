@extends('layouts.layout')

@section('title', 'Task')

@section('content')
  {{ Breadcrumbs::render('task', $task) }}

  <h1 class="display-1 pb-3 mb-3 border-bottom">{{ $task->title }}</h1>

  <blockquote class="blockquote mt-3 mb-5">
    {!! nl2br(e($task->task)) !!}
  </blockquote>

  <small class="text-muted">created_at : {{ $task->created_at }}</small>

  <div class="mt-3">
    <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('task.remove', ['task' => $task->id]) }}" onclick="confirm('Are you sure you want to delete?')" class="btn btn-danger">Remove</a>
  </div>
@endsection