@extends('layouts.layout')

@section('title', 'Home')

@section('content')
  You are logged in!

  @can('is_admin_project')
  <ul class="mt-3">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route('admin.users') }}">Users</a></li>
  </ul>
  @endcan
@endsection