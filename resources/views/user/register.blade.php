@extends('layouts.layout')

@section('title', 'Registration')

@section('content')
  <h1>Registration</h1>
  <form action="{{ route('user.register') }}" method="post" class="mt-3">
    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail" class="form-label">Email address</label>
      <input
          type="email"
          name="email"
          class="form-control @error('email') is-invalid @enderror"
          id="exampleInputEmail"
          aria-describedby="emailHelp"
          value="{{ old('email') }}"
      >
      @error('email')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword" class="form-label">Password</label>
      <input
          type="password"
          name="password"
          class="form-control @error('password') is-invalid @enderror"
          id="exampleInputPassword"
      >
      @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPasswordConfirmation" class="form-label">Password confirm</label>
      <input
          type="password"
          name="password_confirmation"
          class="form-control @error('password_confirmation') is-invalid @enderror"
          id="exampleInputPasswordConfirmation"
      >
      @error('password_confirmation')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection