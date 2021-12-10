@extends('layouts.layout')

@section('title', 'Login')

@section('content')
  <h1>Authentication</h1>
  <form action="{{ route('user.login') }}" method="post" class="mt-3" autocomplete="off">
    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail" class="form-label">Email address</label>
      <input
          name="email"
          type="email"
          class="form-control @error('email') is-invalid @enderror"
          id="exampleInputEmail"
          aria-describedby="emailHelp"
          autocomplete="off"
          value="{{ old('email') }}"
      >
      @error('email')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword" class="form-label">Password</label>
      <input
          name="password"
          type="password"
          class="form-control @error('password') is-invalid @enderror"
          id="exampleInputPassword"
          autocomplete="off"
      >
      @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
@endsection