@extends('layouts.admin')

@section('content')
    <h1>Edit post</h1>
    <div class="col-sm-3">
        <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/200x200'}}" alt=""
             class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
    {!! Form::model($post,['method'=>'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files'=> true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null,['class'=>'form-control']) !!}
    </div>
    @if($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id',  [''=> 'Choose Options'] + $category,null, ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('category_id'))
        <span class="text-danger">{{ $errors->first('category_id') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null,  ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('photo_id'))
        <span class="text-danger">{{ $errors->first('photo_id') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('body', 'Content:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('body'))
        <span class="text-danger">{{ $errors->first('body') }}</span>
    @endif
    <div class="form-group mt-3">
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-4']) !!}
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id],'class'=>'float-right']) !!}
    <div class="form-group">
        {!! Form::submit('Delete post', ['class'=>'btn btn-danger col-sm-4']) !!}
    </div>
    {!! Form::close() !!}
    </div>
@endsection

