@extends('layouts.layout')

@section('title')
  Task
@endsection

@section('content')
  {{ Breadcrumbs::render('task', $task) }}

  <h1 class="display-1 pb-3 mb-3 border-bottom">{{ $task->title }}</h1>

  <blockquote class="blockquote mt-3 mb-5">
    {!! nl2br(e($task->task)) !!}
  </blockquote>

  <small class="text-muted">created_at : {{ $task->created_at }}</small>
@endsection