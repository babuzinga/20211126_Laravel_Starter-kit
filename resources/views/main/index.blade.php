@extends('layouts.layout')

@section('title')
  Index
@endsection

@section('content')
  {{ Breadcrumbs::render('index') }}

  <h1>Hello world!</h1>


@endsection