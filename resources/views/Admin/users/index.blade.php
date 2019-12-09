@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    <table class="table table-striped table-dark table-bordered">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                    <td>
                        <img height="100" width="100" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/100x100'}}" alt=""
                             class="img-responsive img-rounded">
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? ''}}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
