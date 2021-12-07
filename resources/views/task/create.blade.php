@extends('layouts.layout')

@section('title')
  Create task
@endsection

@section('content')
  <h1>Create task</h1>
  <form action="{{ route('task.create') }}" method="post" class="mt-3">
    @csrf

    <div class="mb-3">
      <label for="exampleTitle" class="form-label">Title</label>
      <input
          name="title"
          type="text"
          class="form-control @error('title') is-invalid @enderror"
          id="exampleTitle"
          value="{{ old('title') }}"
      >
      @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <textarea
          name="task"
          class="form-control @error('task') is-invalid @enderror"
          placeholder="Leave a text here"
          id="floatingTextarea">{{ old('task') }}</textarea>
      <label for="floatingTextarea">Task</label>
      @error('task')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <div id="emailHelp" class="form-text">Enter a complete description of the task .</div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection