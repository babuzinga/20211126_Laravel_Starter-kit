@extends('layouts.layout')

@section('title')
    Users
@endsection

@section('content')
@if(count($users))
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">created_at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key =>$user)
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td><a href="{{ route('user.user', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@else
    Пользователи не найдены
@endif
@endsection