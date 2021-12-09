@extends('layouts.layout')

@section('title')
  Tasks
@endsection

@section('content')
  {{ Breadcrumbs::render('tasks') }}

  <h1>Tasks</h1>

  <div class="mt-3 mb-3">
    <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Create</a>
  </div>

  @if(count($tasks))
    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">created_at</th>
        @can('is_manager_project')
          <th scope="col">Owner</th>
          <th scope="col">Control</th>
        @endcan
      </tr>
      </thead>
      <tbody>
      @foreach($tasks as $key =>$task)
        <tr>
          <th scope="row">{{ ++$key }}</th>
          <td><a href="{{ route('task.view', ['task' => $task->id]) }}">{{ $task->title }}</a></td>
          <td>{{ $task->created_at }}</td>
          @can('is_manager_project')
            <td>{{ $task->owner->email }}</td>
            <td>1</td>
          @endcan
        </tr>
      @endforeach
      </tbody>
    </table>
    {{ $tasks->links() }}
  @else
    Tasks not found
  @endif
@endsection