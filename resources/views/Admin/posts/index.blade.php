@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('notAllowed'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('updated'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('deleted'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h1>Posts</h1>
    <table class="table table-striped table-dark table-bordered">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Owner</th>
            <th scope="col">Category</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td><a href="{{ route('users.edit', $post->user->id) }}">{{ $post->user->name }}</a></td>
                    <td>{{ $post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td><img height="100" width="100" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt=""></td>
                    <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->diffForhumans() }}</td>
                    <td>{{ $post->updated_at->diffForhumans() }}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection

