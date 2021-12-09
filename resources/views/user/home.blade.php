@extends('layouts.layout')

@section('title')
  Home
@endsection

@section('content')
  You are logged in!

  @can('is_admin_project')
  <div class="mt-3">
    <a href="{{ route('admin.dashboard') }}">Admin dashboard</a>
  </div>
  @endcan
@endsection