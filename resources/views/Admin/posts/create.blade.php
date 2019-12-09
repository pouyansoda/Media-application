@extends('layouts.admin')

@section('content')
    <h1>Create post</h1>
    {!! Form::open(['method'=>'post', 'action' => 'AdminPostsController@store', 'files'=> true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null,['class'=>'form-control']) !!}
    </div>
    @if($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id',  ['0' => 'PHP', '1' => 'Javascript'],null, ['class'=>'form-control']) !!}
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
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

