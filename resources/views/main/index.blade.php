@extends('layouts.layout')

@section('title', 'Index')

@section('content')
  {{ Breadcrumbs::render('index') }}

  <h1>Hello world!</h1>


@endsection