@extends('layouts.admin')

@section('content')
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
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category_id }}</td>
                    <td><img height="100" width="100" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt=""></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->diffForhumans() }}</td>
                    <td>{{ $post->updated_at->diffForhumans() }}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection

