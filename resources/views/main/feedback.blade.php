@extends('layouts.layout')

@section('title')
  Feedback
@endsection

@section('content')
  <h1>Feedback</h1>
  <form method="post" action="{{ route('feedback') }}" class="mt-3">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             value="{{ old('email') }}">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      @error('email')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <textarea name="message" class="form-control" placeholder="Leave a message here"
                id="floatingTextarea">{{ old('message') }}</textarea>
      <label for="floatingTextarea">Message</label>
      @error('message')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection