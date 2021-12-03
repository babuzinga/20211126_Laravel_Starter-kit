@extends('layout')

@section('title')
    {{ $user->getName() }}
@endsection

@section('content')
    {{ $user->getEmail() }}
@endsection